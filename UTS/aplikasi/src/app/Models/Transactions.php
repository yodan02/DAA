<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'payment_method', 'transaction_date'];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
