<?php

namespace Database\Seeders;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus semua data di tabel users
        User::truncate();

        // Jalankan RoleSeeder terlebih dahulu untuk membuat role
        $this->call(RoleSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(TransactionsSeeder::class);

        // Membuat akun Admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('super_admin');

        // Membuat akun Customer
        $customer = User::create([
            'name' => 'Customer',
            'email' => 'cust@customer.com',
            'password' => bcrypt('password'),
        ]);
        $customer->assignRole('customer');
    }
}
