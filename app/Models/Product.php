<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'photo',
        'seller_id',
        'category_id'
    ];

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->withDefault();
    }

    public function complaint_statuses()
    {
        return $this->hasOne(ComplaintStatus::class, 'id', 'complaint_status_id')->withDefault();
    }
     
}
