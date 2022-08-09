<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Seeder;

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
        Author::factory(25)->create();
        Book::factory(30)->create();
        Category::factory(30)->create();

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

        // Populate roles, permissions and users
        $this->call([
            RolesAndPermissionsSeeder::class,
            UsersSeeder::class
        ]);
    }
}
