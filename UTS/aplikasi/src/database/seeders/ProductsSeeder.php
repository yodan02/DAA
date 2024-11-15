<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        Products::create([
            'name' => 'Mie Ayam Ceker',
            'price' => 25000,
            'stock' => 100,
            'description' => 'Mie ayam dengan ceker ayam yang lezat.',
        ]);

        Products::create([
            'name' => 'Mie Ayam Bakso',
            'price' => 35000,
            'stock' => 50,
            'description' => 'Mie ayam dengan bakso yang kenyal dan gurih.',
        ]);

        Products::create([
            'name' => 'Mie Ayam Pangsit',
            'price' => 30000,
            'stock' => 70,
            'description' => 'Mie ayam dengan pangsit renyah sebagai pelengkap.',
        ]);
    }
}
