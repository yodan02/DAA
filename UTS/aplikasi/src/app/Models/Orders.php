<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'quantity', 'total_price', 'order_date'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
