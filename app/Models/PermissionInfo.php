<?php

namespace App\Models;

class PermissionInfo
{
    protected const all_permissions = [
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
    ];

    protected const librarian_permissions = [
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
    ];

    protected const user_permissions = [
        'book-view',
        'author-view',
        'category-view',
    ];

    public static function getAllPermissions()
    {
        return self::all_permissions;
    }

    public static function getLibrarianPermissions()
    {
        return self::librarian_permissions;
    }

    public static function getUserPermissions()
    {
        return self::user_permissions;
    }
}
