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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    //    $query =  Http::withHeaders([
    //         'Content-Language' => 'uz-UZ',
    //         'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
    //         'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
    //         'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59'
    //     ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/register', [
    //         'amount' => 100,
    //         'clientId' => 2,
    //         'currency' => 643,
    //         'orderNumber' => 1,
    //         'viewType' => 'WEB_VIEW',
    //         'paymentParams' => [
    //             'payType' => 'TWO_STEP'
    //         ],
    //         'sessionTimeoutSecs' => 1000,
    //     ]);
    //     $json = json_decode($query, true);

    //     dd($json);
     }
}
