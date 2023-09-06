<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UniversalBonus;
use App\Helpers\UserAccount;


class UniversalBonusController extends Controller
{
    function __construct() {
        $this->account = new UserAccount();
    }

    public function getUniversalBonuses(){
        return UniversalBonus::all();
    }


    public function getUsersWith($period, $userid){
        $user = User::with('children')->find($userid);
        return $this->account->bindUserData($user, $period);
    }
}
