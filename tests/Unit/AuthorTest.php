<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Author;
use Tests\InteractsWithUsers;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{
    use InteractsWithUsers;
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test author's index route.
     *
     * @return void
     */
    public function test_authors_index_is_only_accesible_by_librarians()
    {
        $this->setUpUser('librarian');

        $response = $this->get('/authors');

        $response->assertStatus(200);
    }

    /**
     * Test author's routes cannot be access by no authenticated users
     *
     * @return void
     */
    public function test_authors_route_access_by_no_authenticated_user_redirect_to_login_page()
    {
        $response = $this->get('/authors');

        $response->assertRedirect('/login');
    }

    /**
     * Test user can create new author
     *
     * @return void
     */
    public function test_user_can_create_new_author()
    {
        $this->setUpUser('librarian');

        $response = $this->post(route('authors.store'), [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastname,
            'birth_date' => $this->faker->date,
        ]);

        $response->assertSessionHasNoErrors();
    }

    /**
     * Test user can edit author information
     *
     * @return void
     */
    public function test_user_can_edit_author_information()
    {
        $this->setUpUser('librarian');

        $author = Author::factory()->create();

        $author->name = 'Test Author';

        $response = $this->put('/authors/'.$author->id, $author->toArray());

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('authors', [
            'id'=> $author->id ,
            'name' => 'Test Author',
        ]);
    }

    /**
     * Test if the author can be deleted
     *
     * @return void
     */
    public function test_authors_delete()
    {
        $author = Author::factory()->create();

        $this->assertTrue($author->delete());
    }
}
