<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions for super_admin
        $superAdminPermissions = [
            'manage_products',      // Can add, edit, delete products
            'manage_orders',        // Can view and manage all orders
            'view_reports',         // Can view reports
        ];

        // Create permissions for pelanggan (customer)
        $pelangganPermissions = [
            'view_products',        // Can view products
            'view_any_products',        // Can view products
            'view_orders',        // Can view products
            'view_any_orders',        // Can view products
            'place_orders',         // Can place orders
            'view_own_orders',      // Can view their own orders
        ];

        // Create permissions for super_admin
        foreach ($superAdminPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);  // Corrected here
        }

        // Create permissions for pelanggan
        foreach ($pelangganPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);  // Corrected here
        }

        // Assign permissions to super_admin role
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $superAdminRole->givePermissionTo($superAdminPermissions);

        // Assign permissions to pelanggan role
        $pelangganRole = Role::firstOrCreate(['name' => 'customer']);
        $pelangganRole->givePermissionTo($pelangganPermissions);
    }
}
