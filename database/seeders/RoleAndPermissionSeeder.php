<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    public function run()
    {
        // Membuat permissions
        $permission1 = Permission::create(['name' => 'manage barang']);
        $permission2 = Permission::create(['name' => 'manage supplier']);
        
        // Membuat roles
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);

        // Menambahkan permissions ke role
        $adminRole->givePermissionTo($permission1, $permission2);
        $staffRole->givePermissionTo($permission1);
    }
}

