<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Orders_Products;
use Http;
use Ixudra\Curl\Facades\Curl;
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
    public function index_by_id($id)
    {
        // return Orders::where('user_id' , $id)->latest()->first();
        return Orders::where('id',$id)->get();

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
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
            $data->save();
            // dd($data->order_summa);
            $uzumPayCurl =  Http::withHeaders([
                'Content-Language' => 'uz-UZ',
                'X-Fingerprint' => '355ecee8b55693deccf2c9461415228ba9c80d38',
                'X-Terminal-Id' => '52ace782-f92f-47d6-8789-39ebd8066e59',
                'X-Signature'=>'MEUCIQC8loCVlc/akDRdaVujJPQg8gMcVebSg5nerEET0X/mVQIgQrRbMQcr8mWeIxwtNt3eG44jA5sHOcFS2jHyxq6Flww=',
            ])->post('https://test-chk-api.ipt-merch.com/api/v1/payment/register', [
                'amount' =>$data->order_summa,
                'clientId' =>  $data->user_id,
                'currency' => 860,
                "successUrl"=> "https://4ever.uz",
                "failureUrl"=> "https://4ever.uz",
                'orderNumber' => $data->id,
                'viewType' => 'WEB_VIEW',
                'paymentParams' => [
                    'payType' => 'TWO_STEP'
                ],
                'sessionTimeoutSecs' => 1000,
            ]);
            
            $payment = json_decode($uzumPayCurl, true);
            $data->orderId = $payment['result']['orderId'];
            $data->save();

            return response()->json([
                'status' => 200,
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
        // dd($request);
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
        // $payment = json_decode($uzumPayCurl, true);
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
