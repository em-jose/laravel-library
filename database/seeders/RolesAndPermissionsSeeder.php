<?php

namespace Database\Seeders;

use \App\Models\PermissionInfo;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = PermissionInfo::getAllPermissions();

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $librarian_role = Role::create(['name' => 'librarian']);
        $user_role = Role::create(['name' => 'user']);

        // Assign permissions to roles
        $librarian_role->givePermissionTo(PermissionInfo::getLibrarianPermissions());

        $user_role->givePermissionTo(PermissionInfo::getUserPermissions());
    }
}
