<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Orders_Products;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Products;
use App\Models\Cashback;
use App\Models\User;
use App\Models\Orders;
use App\Helpers\Helpers;
use Http;
use DB;
use Auth;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // return Orders::where('user_id' , $id)->latest()->first();
        return Orders::where('user_id' , $id)->orderBy('id', 'desc')->get();
       

    }
    public function getLatest()
    {
        $user=Auth::user()->id;
        return Orders::where('user_id' , $user)->latest()->limit(1)->get();

    }
    public function index_all()
    {
        // return Orders::where('user_id' , $id)->latest()->first();
        return Orders::orderBy('id', 'desc')->get();

    }
    public function getCompleted()
    {
        // return Orders::where('user_id' , $id)->latest()->first();
        return  DB::table('orders')
        ->join('tuman','orders.tuman_id','=','tuman.id')
        ->join('viloyat','orders.viloyat_id','=','viloyat.id')
        ->where('order_check','COMPLETED')
        ->select('orders.*','tuman.tuman','viloyat.viloyat')
        ->orderBy('orders.id', 'desc')
        ->get();

    }
    public function getWithProducts($id)
    {
        // return Orders::where('user_id' , $id)->latest()->first();
        return Orders_Products::where('order_id',$id)
        ->orderBy('orders__products.id', 'desc')
        ->get();

    }
    public function getSendOrder($id)
    {
        // return Orders::where('user_id' , $id)->latest()->first();
        $data = new Orders();
        $data = DB::table('orders')
        ->where('id', $id)
        ->update(['send_order' => '1']);
        return response()->json([
            'status' => 200,
            'message'=>'Order Sended'
        ]);


    }
    
    
    public function index_by_id($id)
    {
        $uzum =  Http::withHeaders([
            'Content-Language' => 'uz-UZ',
            'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
            'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
            'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
            ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/getOrderStatus', [               
                'orderId' => $id,                 
            ]);
            $pay = json_decode($uzum, true);
            return Orders::where('orderId',$pay['result']['orderId'])->get();
    }

   

    public function getOrderStatuses($id)
    {

        $response = Curl::to('https://cbu.uz/uz/arkhiv-kursov-valyut/json/USD/')
        ->get();
        $usd = json_decode($response, true);
        // dd($usd[0]['Rate']*100);


        $uzum =  Http::withHeaders([
            'Content-Language' => 'uz-UZ',
            'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
            'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
            'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
            ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/getOrderStatus', [               
                'orderId' => $id,                 
            ]);

            
            // dd($getOrderId[0]['Products']);
            // $uzumOperation =  Http::withHeaders([
                //     'Content-Language' => 'uz-UZ',
                //     'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
                //     'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
                //     'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
                //     ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/getOperationState', [               
                    //         'operation_id' => '381c6272-79a2-432d-9467-cb15710b783a',
                    
                    //     ]);
            $order = Orders::where('orderId',$id)->first();
            // dd($order);
    
            $products = [];
            foreach ($order->products as $key => $product) {
                $products[] = [
                    "product_name"=> $product->productsInfo->product_name,
                    "price"=> $product->productsInfo->price*$order->rate_uzs*100,
                    "count"=> $product->count,
                    "spic"=> "03302001002000000",
                    "package_code"=> '8690359109331',
                    "vat_percent"=> 0,
                    "commission_info"=> ["PINFL"=> "32507722390013"]
                ];
            }

            $pay = json_decode($uzum, true);

            $uzumCheck =  Http::withHeaders([
                'ssl-client-fingerprint'=>'9e8f9cb431f69a39fab5f9cb91727343b8700154'
            ])->post('https://test-arp.ipt-merch.com/fiscal_receipt_generation', [               
                'operation_id' => $pay['result']['operations'][1]['operationId'],
                'date_time'=>$pay['result']['operations'][1]['doneAt'],
                    'cash_amount'=> 0,
                    'card_amount'=> $pay['result']['completedAmount'],
                    'phone_number'=>'998795972323',
                    "items"=> $products
            ]);


            $payCheck = json_decode($uzumCheck, true);
            // dd($payCheck);
            $data = new Orders();
            $data = DB::table('orders')
            ->where('orderId', $id)
            ->update(['order_check' => $pay['result']['status'],'operation_id'=>$payCheck['operation_id'],'urlCheck'=>$payCheck['receipt_url']]);

            if($pay['result']['status']=='COMPLETED'){
                $this->getParentCashback($id);
                $this->getCashback($pay['result']['orderId']);
            }


            return response()->json([
                'status' => 200,
                'message'=>'Order Checked'
            ]);
    }

    public function getParentCashback($id){
        $userPay =Orders::where('orderId',$id)->get();
        $parent_id = User::where('id',$userPay[0]['user_id'])->get();
        $parentCashback = ($userPay[0]['order_summa']/2)*0.25;
        $cashback = new Cashback();

        $older = Cashback::where('user_id',$parent_id[0]['parent_id'])->first();
        
        if(empty($older)){
            $cashback->user_id =$parent_id[0]['parent_id'];
            $cashback->cashback = $parentCashback;
            $cashback->save();
        }
        else{
            $cashback = Cashback::where('user_id',$parent_id[0]['parent_id'])->first();
            $cashback->cashback = $older->cashback + $parentCashback;
            $cashback->save();                    
        }
        return response()->json([
            'status' => 200,
            'message' => "Cashback muvafaqiyatli qo'shildi",
        ]);
    }

    public function getCashback($id){
        $cashback_user = 0;
        $cashback = new Cashback();
        $orders = Orders::where('orderId',$id)->get();
        $helpers = new Helpers();
        $userCashback=$helpers->getCashback($orders[0]['order_summa'])/2;
        $older = Cashback::where('user_id',$orders[0]['user_id'])->first();
        if(empty($older)){
            $cashback->user_id = $orders[0]['user_id'];
            $cashback->cashback = $userCashback;
            $cashback->save();
        }
        else{
            $cashback = Cashback::where('user_id',$orders[0]['user_id'])->first();
            $cashback->cashback = $older->cashback + $userCashback;
            $cashback->save();                    
        }
        return response()->json([
            'status' => 200,
            'message' => "Cashback muvafaqiyatli qo'shildi",
        ]);
           

        
    }
    /**
     * Show the form for creating a new resource.23120000200000111510
     *201055108
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $response = Curl::to('https://cbu.uz/uz/arkhiv-kursov-valyut/json/USD/')
            ->get();
            $usd = json_decode($response, true);

            $result = $request->all();
            $order=$result['cart_user'][0];
            $summa = 0;
                for ($i=0; $i <count($result['cart_user']) ; $i++) { 
                    $summa+= $result['cart_user'][$i]['count']*$result['cart_user'][$i]['price'];
                }
            $data = new Orders();
            $data->user_id = Auth::user()->id; 
            $data->name = $result['name'];
            $data->phone = $result['phone'];
            $data->viloyat_id = $result['viloyat_id'];
            $data->tuman_id = $result['tuman_id'];
            $data->address = $result['address'];
            $data->point = $result['point'];
            $data->pay_id = $result['pay_id'];           
            $data->order_summa = $summa;
            $data->rate_uzs = $usd[0]['Rate'];

            $data->save();

            $uzumPayCurl =  Http::withHeaders([
                'Content-Language' => 'uz-UZ',
                'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
                'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
                'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
            ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/register', [
                'amount' => $data->order_summa* $data->rate_uzs*100,
                'clientId' =>  $data->user_id,
                'currency' => 860,
                "successUrl"=> "https://4ever.uz",
                "failureUrl"=> "https://4ever.uz",
                'orderNumber' => $data->id,
                'viewType' => 'WEB_VIEW',
                'paymentParams' => [
                    'payType' => 'TWO_STEP',
                    'isAutoComplete'=>true
                ],
                'sessionTimeoutSecs' => 1000,
            ]);
            
            $payment = json_decode($uzumPayCurl, true);
            $data->orderId = $payment['result']['orderId'];
            $data->urlPay = $payment['result']['paymentRedirectUrl'];

            $uzum =  Http::withHeaders([
                'Content-Language' => 'uz-UZ',
                'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
                'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
                'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
                ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/getOrderStatus', [               
                    'orderId' =>$payment['result']['orderId'],                 
                ]);
                $pay = json_decode($uzum, true);
                $pay['result']['status'];
                $data->urlPay = $payment['result']['paymentRedirectUrl'];
                $data->save();
            
            
            // $uzum =  Http::withHeaders([
            //     'Content-Language' => 'uz-UZ',
            //     'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
            //     'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
            //     'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
            //     ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/getOrderStatus', [           
            //         'orderId' => $data->orderId,            
            //     ]);
            //     $pay = json_decode($uzum, true);
            //     $order = Orders::where('id',$data->id);
            //     $order->order_check = 'registered';
            //     $order->save();
                
                return response()->json([
                    'status' => 200,
                    'orderId' => $payment['result']['orderId'],
                    'message' => $payment['result']['paymentRedirectUrl'],
                ]);
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $result = $request->all();
        $data = new Orders();    
        $count = Orders_Products::where('order_id',$request['id'])->get();
        for($i=0;$i<count($count);$i++){
            Products::where('id',$count[$i]['product_id'])->decrement('count_products',$count[$i]['count']);
            // dd($count[1]['product_id']);
        }
        $data = DB::table('orders')
            ->where('id', $request['id'])
            ->update(['order_check' => $request['check']]);

        return response()->json([
            'status' => 200,
            'message' => "Order muvafaqiyatli Yangilandi",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated_order(Request $request)
    {
        $data = new Orders();       
        $images = $request->images;
        $array_image;

        for($i=0;$i<count($images);$i++){
            $imageName = time().$i.'.'.$images[$i]->extension(); 
            $images[$i]->move(public_path('images'), $imageName);
            $array_image=$imageName;
        }
        $data = DB::table('orders')
            ->where('id', $request['id_order'])
            ->update(['oreder_pay_image' => $array_image]);
        return response()->json([
            'status' => 200,
            'message' => "Protocol muvafaqiyatli Yangilandi",
        ]);
    }
    public function update(Request $request)
    {
        dd($request);
        $result = $request->all();
        $data = new Orders();    
        $count = Orders_Products::where('order_id',$request['id'])->get();
        for($i=0;$i<count($count);$i++){
            Products::where('id',$count[$i]['product_id'])->decrement('count_products',$count[$i]['count']);
        }
        //  $uzumPayCurl =  Http::withHeaders([
        //     'Content-Language' => 'uz-UZ',
        //     'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
        //     'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
        //     'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
        // ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/getOrderStatus', [           
        //     'orderId' => 18,            
        // ]);
        $payment = json_decode($uzumPayCurl, true);
        $order = Orders::find($request['id']);
        $order->order_check = $request['check'];
        $order->save();

        return response()->json([
            'status' => 200,
            'message' => "Order muvafaqiyatli Yangilandi",
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
