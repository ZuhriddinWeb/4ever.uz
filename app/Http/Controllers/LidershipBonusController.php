<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LidershipBonus;
class LidershipBonusController extends Controller
{
    public function index(){
        return LidershipBonus::all();
    }
}
