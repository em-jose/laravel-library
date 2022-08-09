<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Tests\InteractsWithUsers;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use InteractsWithUsers;
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test book's index route.
     *
     * @return void
     */
    public function test_books_index_is_only_accesible_by_librarians()
    {
        $this->setUpUser('librarian');

        $response = $this->get('/books');

        $response->assertStatus(200);
    }

    /**
     * Test book's routes cannot be access by no authenticated users
     *
     * @return void
     */
    public function test_books_route_access_by_no_authenticated_user_redirect_to_login_page()
    {
        $response = $this->get('/books');

        $response->assertRedirect('/login');
    }

    /**
     * Test user can create new author
     *
     * @return void
     */
    public function test_user_can_create_new_book()
    {
        $this->setUpUser('librarian');

        $author = Author::factory()->create();
        $category = Category::factory()->create();

        $response = $this->post(route('books.store'), [
            'title' => $this->faker->text(15),
            'lastname' => $this->faker->text(200),
            'isbn13' => $this->faker->isbn13(),
            'publication_date' => $this->faker->date,
            'authors' => [$author->id],
            'categories' => [$category->id]
        ]);

        $response->assertSessionHasNoErrors();
    }

    /**
     * Test user can edit book information
     *
     * @return void
     */
    public function test_user_can_edit_book_information()
    {
        $this->setUpUser('librarian');

        $book = Book::factory()->create();
        $author = Author::factory()->create();
        $category = Category::factory()->create();

        $book->title = 'Test Book';

        $book_data = $book->toArray();
        $book_data['authors'] = [$author->id];
        $book_data['categories'] = [$category->id];

        $response = $this->put('/books/'.$book->id, $book_data);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('books', [
            'id'=> $book->id ,
            'title' => 'Test Book',
        ]);
    }

    /**
     * Test if the book can be deleted
     *
     * @return void
     */
    public function test_books_delete()
    {
        $book = Book::factory()->create();

        $this->assertTrue($book->delete());
    }
}
