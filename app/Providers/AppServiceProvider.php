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
    //    $k =  Http::withHeaders([
    //         'Content-Language' => 'uz-UZ',
    //         'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
    //         'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
    //         'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
    //     ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/register', [
    //         'amount' => 100000,
    //         'clientId' => 2,
    //         'currency' => 860,
    //         "successUrl"=> "https://4ever.uz",
    //         // "failureUrl"=> "https://example.com",
    //         'orderNumber' => 18,
    //         'viewType' => 'WEB_VIEW',
    //         'paymentParams' => [
    //             'payType' => 'TWO_STEP'
    //         ],
    //         'sessionTimeoutSecs' => 1000,
    //     ]);
    //     $usd = json_decode($k, true);

    //     dd($usd);
     }
    //  9860120182993282
    //  1225
}
