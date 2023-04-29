<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WorldwideTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $email = "admin@redberry.ge";
        $username = "admin";
        $password = '1234';

        $user = User::factory()->create([
            'email' => $email,
            'password' => bcrypt($password),
            'username' => $username,
        ]);

        $this->user = $user;
    }

    public function test_should_redirect_us_to_log_in_if_guest(){
        $response = $this->get('/worldwide');
        $response->assertRedirect('/login');
    }
    public function test_should_show_us_worldwide_page_if_user_is_logged_in(): void
    {
        $response = $this->actingAs($this->user)->get('/worldwide');
        $response->assertViewIs('worldwide');
        $response->assertSee('Death');
        $response->assertSee('New cases');
        $response->assertSee('Recovered');
    }
}
