<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
class MoneyController extends Controller
{

    public function index($user_id){
        return Money::where('user_id' , $user_id)->get();
    }

    public function show($period, $user_id){
        return Money::where([
            'period' => $period,
            'user_id' => $user_id,
        ])->first();
    }


    public function store(Request $request){
        return Money::create([
            'user_id' => $request->user_id,
            'period' => $request->period,
            'summa' => $request->summa,
            'classification' => $request->classification,

            'check' => false,
        ]);
    }
}
