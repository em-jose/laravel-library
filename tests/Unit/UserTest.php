<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Tests\InteractsWithUsers;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use InteractsWithUsers;
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test users index route.
     *
     * @return void
     */
    public function test_users_index_route_is_only_accesible_by_admins()
    {
        $this->setUpUser('admin');

        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    /**
     * Test users index could not be accessed by librarian users.
     *
     * @return void
     */
    public function test_users_index_route_is_not_accesible_by_librarians()
    {
        $this->setUpUser('librarians');

        $response = $this->get('/users');

        $response->assertStatus(403);
    }

    /**
     * Test users routes cannot be access by no authenticated users
     *
     * @return void
     */
    public function test_users_route_access_by_no_authenticated_user_redirect_to_login_page()
    {
        $response = $this->get('/users');

        $response->assertRedirect('/login');
    }

    /**
     * Test admin user can create new user
     *
     * @return void
     */
    public function test_admin_user_can_create_new_user()
    {
        $this->setUpUser('admin');

        $response = $this->post(route('users.store'), [
            'name' => $this->faker->name,
            'lastname' => $this->faker->lastname,
            'email' => $this->faker->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'roles' => [1]
        ]);

        $response->assertSessionHasNoErrors();
    }

    /**
     * Test admin user can edit user information
     *
     * @return void
     */
    public function test_admin_user_can_edit_user_information()
    {
        $this->setUpUser('admin');

        $user = User::factory()->create();

        $user->email = 'test@email.com';
        $user_data = $user->toArray();
        $user_data['roles'] = [1];

        $response = $this->put('/users/'.$user->id, $user_data);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('users', [
            'id'=> $user->id ,
            'email' => 'test@email.com',
        ]);
    }

    /**
     * Test if the user can be deleted
     *
     * @return void
     */
    public function test_users_delete()
    {
        $user = User::factory()->create();

        $this->assertTrue($user->delete());
    }
}
