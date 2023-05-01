<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_check_if_forgot_password_view_is_accessable(): void
    {
        $response = $this->get(route('password.request'));

        $response->assertViewis('reset');
    }

    public function test_should_return_error_if_email_not_provided(){
        $response = $this->post(route('password.email'));

        $response->assertSessionHasErrors([
            'email' => 'The Email field is required'
        ]);
    }
    public function test_should_return_error_if_email_is_not_valid(){
        $response = $this->post(route('password.email'), [
            'email' => "notvalidemail.com"
        ]);
        $response->assertSessionHasErrors([
            'email' => 'Email must be valid'
        ]);
    }

    public function test_should_give_us_error_if_email_is_not_registered(){
        $response = $this->post(route('password.email'), [
            'email' => "validbutnotindb@example.com"
        ]);
        $response->assertSessionHasErrors([
            'email' => "We can't find a user with that email address"
        ]);
    }

    public function test_should_redirect_us_to_success_page_if_email_is_sent(){
        $email = "validemail@example.com";
        User::factory()->create([
            'email' => $email
        ]);
        $response = $this->post(route('password.email'), [
            'email' => $email
        ]);

        $response->assertRedirect(route('reset.sent'));
    }

    public function test_password_is_reseted(){
        $user = User::factory()->create();

        $token = Password::createToken($user);
        $password = "1234";
        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect(route('reset.success'))
                 ->assertSessionHas('status', 'Your password has been reset.');

        $this->assertTrue(Hash::check($password, $user->fresh()->password));
    }
    
}
