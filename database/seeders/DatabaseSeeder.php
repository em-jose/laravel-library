<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Populate main tables
        Author::factory(10)->create();
        Book::factory(30)->create();
        Category::factory(30)->create();

        DB::table('users')->insert([
            'name' => 'Wilbur',
            'lastname' => 'Whateley',
            'email' => 'user@library.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Howard Phillips',
            'lastname' => 'Lovecraft',
            'email' => 'librarian@library.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // Populate "author_book" table
        $books = Book::all();

        Author::all()->each(function ($author) use ($books) {
            $author->books()->attach(
                $books->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Populate "book_category" table
        $categories = Book::all();

        $books->each(function ($book) use ($categories) {
            $book->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Populate roles
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::create(['name' => 'user']);
        Role::create(['name' => 'librarian']);

        // Give roles to the users
        $user = User::find(1);
        $user->assignRole('librarian');

        $user = User::find(2);
        $user->assignRole('user');

    }
}
