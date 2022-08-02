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
        $permissions = [
            'book-view',
            'book-create',
            'book-edit',
            'book-delete',
            'author-view',
            'author-create',
            'author-edit',
            'author-delete',
            'category-view',
            'category-create',
            'category-edit',
            'category-delete',
            'user-view',
            'user-create',
            'user-edit',
            'user-delete',
            'librarian-view',
            'librarian-create',
            'librarian-edit',
            'librarian-delete',
            'admin-view',
            'admin-create',
            'admin-edit',
            'admin-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $admin_role = Role::create(['name' => 'admin']);
        $librarian_role = Role::create(['name' => 'librarian']);

        // Assign permissions to roles
        $admin_role->givePermissionTo($permissions);

        $librarian_role->givePermissionTo([
            'book-view',
            'book-create',
            'book-edit',
            'book-delete',
            'author-view',
            'author-create',
            'author-edit',
            'author-delete',
            'category-view',
            'category-create',
            'category-edit',
            'category-delete',
        ]);
    }
}
