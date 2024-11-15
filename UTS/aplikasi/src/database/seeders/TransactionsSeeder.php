<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transactions;
use App\Models\Orders;

class TransactionsSeeder extends Seeder
{
    public function run()
    {
        $order = Orders::first();

        Transactions::create([
            'order_id' => $order->id,
            'payment_method' => 'cash',
        ]);
    }
}
