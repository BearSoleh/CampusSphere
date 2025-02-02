<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity', 
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->withDefault();
    }
    
    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id')->withDefault();
    }

     
     
}
