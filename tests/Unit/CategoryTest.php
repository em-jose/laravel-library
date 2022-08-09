<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Tests\InteractsWithUsers;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use InteractsWithUsers;
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test categories's index route.
     *
     * @return void
     */
    public function test_categories_index_is_only_accesible_by_librarians()
    {
        $this->setUpUser('librarian');

        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    /**
     * Test categories's routes cannot be access by no authenticated users
     *
     * @return void
     */
    public function test_categories_route_access_by_no_authenticated_user_redirect_to_login_page()
    {
        $response = $this->get('/categories');

        $response->assertRedirect('/login');
    }

    /**
     * Test user can create new category
     *
     * @return void
     */
    public function test_user_can_create_new_category()
    {
        $this->setUpUser('librarian');

        $response = $this->post(route('categories.store'), [
            'name' => $this->faker->name
        ]);

        $response->assertSessionHasNoErrors();
    }

    /**
     * Test user can edit category information
     *
     * @return void
     */
    public function test_user_can_edit_category_information()
    {
        $this->setUpUser('librarian');

        $category = Category::factory()->create();

        $category->name = 'Test Category';

        $response = $this->put('/categories/'.$category->id, $category->toArray());

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('categories', [
            'id'=> $category->id ,
            'name' => 'Test Category',
        ]);
    }

    /**
     * Test if the category can be deleted
     *
     * @return void
     */
    public function test_categories_delete()
    {
        $category = Category::factory()->create();

        $this->assertTrue($category->delete());
    }
}
