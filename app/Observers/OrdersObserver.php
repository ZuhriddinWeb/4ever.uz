<?php

namespace App\Observers;

use App\Models\Orders;
use App\Models\Orders_Products;
use App\Models\Cashback;

class OrdersObserver
{
    public $afterCommit = true;
    /**
     * Handle the Orders "created" event.
     *
     * @param  \App\Models\Orders  $orders
     * @return void
     */
    public function created(Orders $orders)
    {
        $result = request()->all();
        $order = $result['cart_user'][0];
        for($i=0;$i<count($result['cart_user']);$i++){
            $data = new Orders_Products();
            $data->order_id = $orders['id'];
            $data->product_id = $result['cart_user'][$i]['product_id'];
            $data->count =  $result['cart_user'][$i]['count'];             
            $data->save();
        }
        return response()->json([
            'status' => 200,
            'message' => "Orders Products muvafaqiyatli qo'shildi",
        ]);
    }

    /**
     * Handle the Orders "updated" event.
     *
     * @param  \App\Models\Orders  $orders
     * @return void
     */
    public function updated(Orders $orders)
    {
        $result = request()->all();
        $cashback_user=0;
        $model = new Cashback();
        if($result['order_summa']>150){
            $cashback_user+=100*0.1;           
        }
        if($result['order_summa']<150){
            $cashback_user+=($result['order_summa']-50)*0.1;
        }
        if($result['order_summa']>300){
            $cashback_user+=150*0.15;           
        }
        if($result['order_summa']<300){
            $cashback_user+=($result['order_summa']-150)*0.15;
        }
        if($result['order_summa']>500){
            $cashback_user+=200*0.2;           
        }
        if($result['order_summa']<500){
            $cashback_user+=($result['order_summa']-300)*0.2;
        }
        if($result['order_summa']>800){
            $cashback_user+=($result['order_summa']-800)*0.3;
            $cashback_user+=300*0.25;       
        }
        
        elseif($result['order_summa']<800){
            $cashback_user+=($result['order_summa']-500)*0.25;
        }
            $older = Cashback::where('user_id',$result['user_id'])->first();
            
            if(empty($older)){
                $model->user_id=$result['user_id'];
                $model->cashback=$cashback_user;
                $model->save();
            }
            else{
                $cashback = Cashback::where('user_id',$older->user_id)->first();
                $cashback->cashback=$older->cashback+$cashback_user;
                $cashback->save();                    
            }
           

        return response()->json([
            'status' => 200,
            'message' => "Cashback muvafaqiyatli qo'shildi",
        ]);

    }

    /**
     * Handle the Orders "deleted" event.
     *
     * @param  \App\Models\Orders  $orders
     * @return void
     */
    public function deleted(Orders $orders)
    {
        //
    }

    /**
     * Handle the Orders "restored" event.
     *
     * @param  \App\Models\Orders  $orders
     * @return void
     */
    public function restored(Orders $orders)
    {
        //
    }

    /**
     * Handle the Orders "force deleted" event.
     *
     * @param  \App\Models\Orders  $orders
     * @return void
     */
    public function forceDeleted(Orders $orders)
    {
        //
    }
}
