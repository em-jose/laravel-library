<?php

namespace Database\Seeders;

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
        Permission::create(['name' => 'books-access']);
        Permission::create(['name' => 'author-access']);

        // Create roles
        $librarian_role = Role::create(['name' => 'librarian']);
        $user_role = Role::create(['name' => 'user']);

        // Assign permissions to roles
        $librarian_role->givePermissionTo([
            'author-access',
        ]);

        $user_role->givePermissionTo([
            'books-access',
        ]);
    }
}
