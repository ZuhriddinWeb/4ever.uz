<?php

namespace App\Observers;

use App\Models\Orders;
use App\Models\Orders_Products;
use App\Models\Cashback;
use App\Models\User;

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
        if($result["pay_id"]==1){
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
        elseif($result["pay_id"]==3){
            for($i=0;$i<count($result['cart_user']);$i++){
                $data = new Orders_Products();
                $data->order_id = $orders['id'];
                $data->product_id = $result['cart_user'][$i]['id'];
                $data->count =  $result['cart_user'][$i]['count'];             
                $data->save();
            }
            return response()->json([
                'status' => 200,
                'message' => "Orders Products muvafaqiyatli qo'shildi",
            ]);
        }
    }

    /**
     * Handle the Orders "updated" event.
     *
     * @param  \App\Models\Orders  $orders
     * @return void
     */
    public function updated(Orders $orders)
    {
       
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
