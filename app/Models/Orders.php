<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderId',
        'operation_id',
        'operationState',
        'operationType',
        'urlPay',
        'urlCheck',
        'user_id',
        'payment_id',
        'oreder_pay_image',
        'order_check',
        'order_summa'
    ];

    protected $with = ['Products'];
   
    protected $casts = ['created_at' => 'datetime:d-m-Y'];
    
    public function Products()
    {
        return $this->hasMany(Orders_Products::class, 'order_id');
    }


    public function scopeSumInPeriod($query, $between)
    {
        return $query->without('Products')->whereBetween('created_at', $between)->selectRaw('sum(order_summa) as total');
    }

    public function scopeSumInAllPeriod($query)
    {
        return $query->without('Products')->selectRaw('sum(order_summa) as total');
    }
}
