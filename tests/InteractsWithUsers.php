<?php

namespace Tests;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

trait InteractsWithUsers
{
    /**
     * Setup user for testing
     */
    public function setUpUser(string $role)
    {
        $this->logout();

        $this->user = User::factory()->create();

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

        // Create role and assign to user
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        if ($role == 'admin') {
            $admin_role = Role::create(['name' => 'admin']);
            $admin_role->givePermissionTo($permissions);
            $this->user->assignRole('admin');
        } elseif ($role == 'librarian') {
            $librarian_role = Role::create(['name' => 'librarian']);
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

            $this->user->assignRole('librarian');
        }

        $this->login();

        return $this;
    }

    /**
     * Login the user in the app
     */
    public function login()
    {
        $this->actingAs($this->user);
    }

    /**
     * Logout the user in the app
     */
    public function logout()
    {
        $this->user = null;
    }
}
