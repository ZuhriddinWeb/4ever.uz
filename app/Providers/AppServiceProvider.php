<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Orders;
use Illuminate\Support\Facades\Storage;
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

        

    





        
        // $uzumPayCurl =  Http::withHeaders([
        //     'Authorization' => 'testapelsin:X46gsp2TeKfLpksnp3tnTgz82a52dM',
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
