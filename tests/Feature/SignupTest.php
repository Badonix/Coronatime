<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SignupTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_if_signup_page_is_accessable(): void
    {
        $response = $this->get(route('signup'));
        $response->assertSuccessful();
    }

    public function test_should_give_us_errors_when_inputs_are_not_provided()
    {
        $response = $this->post(route('signup.store'));
        $response->assertSessionHasErrors([
            'username', 'email', 'password'
        ]);
    }

    public function test_should_give_us_errors_when_email_is_not_valid()
    {
        $response = $this->post(route('signup.store'), [
            'email' => "redberry"
        ]);
        $response->assertSessionHasErrors([
            'email' => "Email must be valid"
        ]);
    }

    public function test_should_give_us_error_when_passwords_do_not_match()
    {
        $response = $this->post(route('signup.store'), [
            'username' => 'admin',
            'email' => 'admin@redberry.ge',
            'password' => 'password',
            'password_confirmation' => 'passw'
        ]);
        $response->assertSessionHasErrors([
            'password' => "Passwords do not match"
        ]);
    }

    public function test_should_give_us_error_when_username_is_less_than_3_characters()
    {
        $response = $this->post(route('signup.store'), [
            'username' => 'Jo',
            'email' => 'admin@redberry.ge',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        $response->assertSessionHasErrors([
            'username' => "Username must be at least 3 symbols"
        ]);
    }

    public function test_should_give_us_error_when_password_is_less_than_3_characters()
    {
        $response = $this->post(route('signup.store'), [
            'username' => 'admin',
            'email' => 'admin@redberry.ge',
            'password' => 'pa',
            'password_confirmation' => 'pa'
        ]);
        $response->assertSessionHasErrors([
            'password' => "Password must be at least 3 symbols"
        ]);
    }

    public function test_should_give_us_error_when_email_already_exists(){
        $email = "admin@redberry.ge";
        $username = "RANDOM_NAME";
        $password = '1234';

        $user = User::factory()->create([
            'email' => $email,
            'username' => $username,
            'password' => bcrypt($password)
        ]);

        $response = $this->post(route('signup.store'), [
            'username' => 'admin',
            'email' => 'admin@redberry.ge',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        $response->assertSessionHasErrors([
            'email' => "The Email has already been taken."
        ]);
    }
    
    public function test_should_redirect_us_to_confirm_email_page_after_successful_signup(){
        $response = $this->post(route('signup.store'), [
            'username' => 'admin',
            'email' => 'admin@redberry.ge',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
    
        $response->assertRedirect(route('verification.notice'));
    }
    

}
