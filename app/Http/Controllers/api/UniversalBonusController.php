<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use App\Models\UniversalBonus;
use Auth;
use Carbon\Carbon;


class UniversalBonusController extends Controller
{

    public function getUniversalBonuses(){
        return UniversalBonus::all();
    }


    public function getUsersWith($period, $userid){
        $periodInt = (int)$period;


        
        $user = User::with('children')->find($userid);

        $date = Carbon::create($user->created_at);
        $today = Carbon::now();
        $diffDay = $today->diffInDays($date);
        $user->lastPeriod = $this->detectionPeriod($diffDay);


        $days = [];
        for ($i = 1; $i <= $user->lastPeriod; $i++) { 
            $days[] =  $this->getPeriodDays($i, $user);
        }
        $user->allperiods = $days;

        $between = $this->getPeriodDays($periodInt, $user);

        $user->days = $between;
        $user->periodSumma = Orders::without('Products')->where('user_id', $user->id)
        ->whereBetween('created_at', $between)
        ->selectRaw('sum(order_summa) as total')
        ->first()->total;
        
        $user->total = Orders::without('Products')->where('user_id', $user->id)
        ->selectRaw('sum(order_summa) as total')
        ->first()->total;

        $this->recursion($user->children, 1, $periodInt, $user);

        return $user;
    }


    public function getUsersWithChildrens($period){
        $periodInt = (int)$period;


        
        $user = User::with('children')->find(Auth::user()->id);

        $date = Carbon::create($user->created_at);
        $today = Carbon::now();
        $diffDay = $today->diffInDays($date);
        $user->lastPeriod = $this->detectionPeriod($diffDay);




        $between = $this->getPeriodDays($periodInt, $user);

        $user->days = $between;
        $user->periodSumma = Orders::without('Products')->where('user_id', $user->id)
        ->whereBetween('created_at', $between)
        ->selectRaw('sum(order_summa) as total')
        ->first()->total;
        
        $user->total = Orders::without('Products')->where('user_id', $user->id)
        ->selectRaw('sum(order_summa) as total')
        ->first()->total;

        $this->recursion($user->children, 1, $periodInt, $user);

        return $user;
    }


    public function getPeriod($period){
        $days = new \stdClass;
        $days->lastDay = $period * 30;
        $days->firstDay = $days->lastDay - 30;
        return $days;
    }

    public function detectionPeriod($day){
        return $day == 0 ? 1 : ceil($day/30);
    }

    public function recursion($array, $index, $period, $mainuser){
        foreach ($array as $key => $user) {
            $user->level = $index;
            
            $user->total = Orders::without('Products')->where('user_id', $user->id)
            ->whereBetween('created_at', $this->getPeriodDays($period, $mainuser))
            ->selectRaw('sum(order_summa) as total')
            ->first()->total;

            if($index == 1){
                $user->summaBranch = $user->total;
                $this->getSummaBranch($user, $period);
            }

            $this->recursion($user->children, $index + 1, $period, $mainuser);
        }
    }



    public function getPeriodDays($custperiod = null, $user){

        $date = Carbon::create($user->created_at);
        $today = Carbon::now();

        if($custperiod == null){
            $diffDay = $today->diffInDays($date);
            $period = $this->detectionPeriod($diffDay);
            $days = $this->getPeriod($period);
        }
        else{
            $days = $this->getPeriod($custperiod);
        }

        
        $last = $date->copy()->addDays($days->lastDay)->format('Y-m-d');
        $first = $date->addDays($days->firstDay)->format('Y-m-d');
        return [$first, $last];
    }


    public function getSummaBranch($mainuser, $period){
        $this->summaRecursion($mainuser->children, $mainuser, $period);
    }


    public function summaRecursion($array, $mainuser, $period){
        foreach ($array as $key => $user) {
            $mainuser->summaBranch += Orders::without('Products')->where('user_id', $user->id)
            ->whereBetween('created_at', $this->getPeriodDays($period, $mainuser))
            ->selectRaw('sum(order_summa) as total')
            ->first()->total;

            $this->summaRecursion($user->children, $mainuser, $period);
        }
    }
}
