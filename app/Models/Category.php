<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category' 
    ];

    public function complaint_sources()
    {
        return $this->hasOne(ComplaintSource::class, 'id', 'complaint_source_id')->withDefault();
    }

    public function complaint_statuses()
    {
        return $this->hasOne(ComplaintStatus::class, 'id', 'complaint_status_id')->withDefault();
    }
     
}
