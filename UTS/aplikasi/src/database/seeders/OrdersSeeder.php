<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Orders;
use App\Models\Products;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $product = Products::first();

        Orders::create([
            'product_id' => $product->id,
            'quantity' => 2,
            'total_price' => $product->price * 2,
        ]);
    }
}
