<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_check_if_forgot_password_view_is_accessable(): void
    {
        $response = $this->get('/forgot-password');

        $response->assertViewis('reset');
    }

    public function test_should_return_error_if_email_not_provided(){
        $response = $this->post('/forgot-password');

        $response->assertSessionHasErrors([
            'email' => 'The Email field is required'
        ]);
    }
    public function test_should_return_error_if_email_is_not_valid(){
        $response = $this->post('/forgot-password', [
            'email' => "notvalidemail.com"
        ]);
        $response->assertSessionHasErrors([
            'email' => 'Email must be valid'
        ]);
    }

    public function test_should_give_us_error_if_email_is_not_registered(){
        $response = $this->post('/forgot-password', [
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
        $response = $this->post('/forgot-password', [
            'email' => $email
        ]);

        $response->assertRedirect('/reset-password-sent');
    }

}
