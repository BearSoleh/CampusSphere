<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total_price', 
        'seller_id',
        'order_status_id'
    ];

    public function customer()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->withDefault();
    }

    public function order_status()
    {
        return $this->hasOne(OrderStatus::class, 'id', 'order_status_id')->withDefault();
    }
     
}
