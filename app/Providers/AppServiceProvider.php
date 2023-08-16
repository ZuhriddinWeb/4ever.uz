<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Orders;
use Http;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //2387
    }

    /**
     * Bootstrap any application services.1951c2ff-433b-4136-b75e-4e15062f4127
     *
     * @return void
     */
    public function boot()
    {

        // function calculate($summa){
        //     $minimalSumma = 30;
        //     $array = [];

        //     if($summa > 800){
        //         $array[] = ($summa - 800)*0.3;
                
        //         $array[] = 300 * 0.25;
        //         $array[] = 200 * 0.2;
        //         $array[] = 150 * 0.15;
        //         $array[] = (150 - $minimalSumma) * 0.1;
        //     }

        //     if($summa > 500 && $summa <= 800){
        //         $array[] = ($summa - 500)*0.25;
        //         $array[] = 200 * 0.2;
        //         $array[] = 150 * 0.15;
        //         $array[] = (150 - $minimalSumma) * 0.1;
        //     }

        //     if($summa > 300 && $summa <= 500){
        //         $array[] = ($summa - 300)*0.2;
        //         $array[] = 150 * 0.15;
        //         $array[] = (150 - $minimalSumma) * 0.1;
        //     }

        //     if($summa > 150 && $summa <= 300){
        //         $array[] = ($summa - 150)*0.15;
        //         $array[] = (150 - $minimalSumma) * 0.1;
        //     }

        //     if($summa > $minimalSumma && $summa <= 150){
        //         $array[] = ($summa - $minimalSumma)*0.1;
        //     }

        //     return $array;
        // }


        // $array = calculate(680);

        // $summa = 0;
        // foreach ($array as $key => $sum) {
        //     $summa += $sum;
        // }


    







        
        // $uzumPayCurl =  Http::withHeaders([
        //     'Authorization' => '355ecee8b55693deccf2c9461415228ba9c80d38',
        //     'Accept-Language' => 'uz-UZ',
        //     'Content-Type' => 'application/json',            
        // ])->post('https://test-topup.apelsin.uz/api/v2/merchant', [
        //     "jsonrpc"=> "2.0",
        //     "id"=> "2000",
        //     "method"=> "cards.get",
        //     "params"=> [
        //         "number"=> "986010010000000",
        //         "expire"=> "2708"
        //     ]

        // ]);
        // json_decode($uzumPayCurl, true);

        // dd( json_decode($uzumPayCurl, true));
    //   $uzumPayCurl =  Http::withHeaders([
    //         'Content-Language' => 'uz-UZ',
    //         'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
    //         'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
    //         'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
    //             ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/getOrderStatus', [           
    //                 'orderId' => '05783ace-4d22-4067-add5-bed90108804d',            
    //             ]);
    //     $usd = json_decode($uzumPayCurl, true);

    //     dd($usd);
    
    // f1aaf450-e128-4fd6-8e22-232461d9f780
    }

}
