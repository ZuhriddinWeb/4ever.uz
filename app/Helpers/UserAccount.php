<?php

namespace App\Helpers;
use App\Models\Orders;
use Carbon\Carbon;


class UserAccount{

    public function recursion($array, $index, $periodDays, $mainuser){
        foreach ($array as $key => $user) {
            $user->level = $index;
            $user->total = Orders::where('user_id', $user->id)->sumInPeriod($periodDays)->first()->total/2;
            $this->recursion($user->children, $index + 1, $periodDays, $mainuser);


            if($index == 1){
                $user->summaBranch = $user->total;
                $this->summaRecursion($user->children, $user, $periodDays);
            }
        }
    }

    public function summaRecursion($childrens, $mainuser, $periodDays){
        foreach ($childrens as $key => $user) {

            $mainuser->summaBranch += Orders::where('user_id', $user->id)->sumInPeriod($periodDays)->first()->total/2;
            $this->summaRecursion($user->children, $mainuser, $periodDays);

        }
    }




    public function bindUserData($user, $period){

        $user->lastPeriod = $this->getLastPeriod($user);
        $user->allperiods = $this->getAllPeriodDays($user);

        $periodDays = $this->getPeriodDays($period, $user);
        $user->days = $periodDays;
        $user->total = Orders::where('user_id', $user->id)->sumInAllPeriod()->first()->total;
        // $user->periodSumma = Orders::where('user_id', $user->id)->sumInPeriod($periodDays)->first()->total;

        $this->recursion($user->children, 1, $periodDays, $user);

        return $user;
    }



    public function getPeriodDays($period = null, $user){
        $registrationDate = Carbon::create($user->created_at);

        $days = $this->getDays($period);
        $lastDay = $registrationDate->copy()->addDays($days->lastDay)->format('Y-m-d');
        $firstDay = $registrationDate->copy()->addDays($days->firstDay)->format('Y-m-d');

        return [$firstDay, $lastDay];
    }


    public function diffDays($user){
        $date = Carbon::create($user->created_at);
        $today = Carbon::now();
        return $today->diffInDays($date);
    }


    public function getDays($period){
        $days = new \stdClass;
        $days->lastDay = $period * 30;
        $days->firstDay = $days->lastDay - 30;
        return $days;
    }

    public function getAllPeriodDays($user){
        $days = [];
        for ($i = 1; $i <= $user->lastPeriod; $i++) { 
            $days[] =  $this->getPeriodDays($i, $user);
        }
        return $days;
    }

    public function detectionPeriod($day){
        return $day == 0 ? 1 : ceil($day/30);
    }

    public function getLastPeriod($user){
        $diffDays = $this->diffDays($user);
        return $this->detectionPeriod($diffDays);
    }
}