<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);

        $editPermission = Permission::create(['name' => 'edit categories']);
        $createPermission = Permission::create(['name' => 'create categories']);

        $adminRole->givePermissionTo($editPermission, $createPermission);

        $user = User::find(1);
        $user->assignRole('admin');
    }
}
