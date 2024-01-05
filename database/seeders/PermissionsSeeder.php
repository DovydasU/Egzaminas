<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = Role::create(['name' => 'admin']);
        $vartotojas = Role::create(['name' => 'vartotojas']);

        // Permissions for admins
        Permission::create(['name' => 'add restaurant']);
        Permission::create(['name' => 'add menu']);
        Permission::create(['name' => 'add product']);
        Permission::create(['name' => 'manage orders']);

        $admin->givePermissionTo('add restaurant');
        $admin->givePermissionTo('add menu');
        $admin->givePermissionTo('add product');
        $admin->givePermissionTo('manage orders');

        // Permission for vartotojas to order products
        Permission::create(['name' => 'order product']);
        $vartotojas->givePermissionTo('order product');

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@food.lt',
            'password' => bcrypt('password'),
        ])->assignRole('admin');

        for ($i = 0; $i < 10; $i++) {
            $user = User::factory()->create()->assignRole('vartotojas');
            $user->givePermissionTo('order product');
        }
    }
}