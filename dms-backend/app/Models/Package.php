<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_id', 
        'package_description',
        'length',
        'width',
        'height',
        'weight',
    ];

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
