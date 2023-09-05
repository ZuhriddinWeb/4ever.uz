<?php

namespace App\Helpers;

class Helpers{
    public function calculate($summa){
        $minimalSumma = 30;
        $array = [];

        if($summa > 800){
            $array[] = ($summa - 800)*0.3;
            
            $array[] = 300 * 0.25;
            $array[] = 200 * 0.2;
            $array[] = 150 * 0.15;
            $array[] = (150 - $minimalSumma) * 0.1;
        }

        if($summa > 500 && $summa <= 800){
            $array[] = ($summa - 500)*0.25;
            $array[] = 200 * 0.2;
            $array[] = 150 * 0.15;
            $array[] = (150 - $minimalSumma) * 0.1;
        }

        if($summa > 300 && $summa <= 500){
            $array[] = ($summa - 300)*0.2;
            $array[] = 150 * 0.15;
            $array[] = (150 - $minimalSumma) * 0.1;
        }

        if($summa > 150 && $summa <= 300){
            $array[] = ($summa - 150)*0.15;
            $array[] = (150 - $minimalSumma) * 0.1;
        }

        if($summa > $minimalSumma && $summa <= 150){
            $array[] = ($summa - $minimalSumma)*0.1;
        }

        return $array;
    }


    public function getCashback($summa){
        $array = $this->calculate($summa);

        $summa = 0;
        foreach ($array as $key => $sum) {
            $summa += $sum;
        }

        return $summa;
    }
}