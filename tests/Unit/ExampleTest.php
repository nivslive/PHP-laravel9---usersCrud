<?php

namespace Tests\Unit;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function should_be_true_is_true()
    {
        $this->assertTrue(true);
    }
    public function test_should_be_users_get_return_array() {
        $this->artisan('db:seed');
        $user = new UserController;
        $user->index();
        var_dump($user->index());
        return $this->assertIsArray($user->index());
    }

    public function should_be_users_exists_by_route() {
       // $response = $this->call('GET', '/api');
       // return $response;
    }

    public function that_user_was_posted() {

    }

}
