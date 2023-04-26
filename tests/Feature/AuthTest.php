<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
  

    public function test_if_login_page_is_accessible(){
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('login');
    }

    public function test_auth_should_give_us_errors_if_input_is_not_provided(){
     
        $response = $this->post('/login');
        $response->assertSessionHasErrors([
            'login','password' 
        ]); 
    }
    
    public function test_auth_should_give_us_error_if_username_is_not_provided(){

        $response = $this->post('/login', [
            'password' => 'P4SSW0RD'
        ]);
        $response->assertSessionHasErrors([
            'login'
        ]);
        $response->assertSessionDoesntHaveErrors(['password']);
    }

    public function test_auth_should_give_us_error_if_password_is_not_provided(){

        $response = $this->post('/login', [
            'login' => 'ADMIN'
        ]);
        $response->assertSessionHasErrors(['password']);
        $response->assertSessionDoesntHaveErrors(['login']);
    }

    public function test_auth_should_give_us_incorrect_credentials_error_when_user_does_not_exist(){
        $response = $this->post('/login', [
            'login' => "admin",
            'password' => "password"
        ]);
        $response->assertSessionHasErrors(['wrong']);
    }

    public function test_auth_should_redirect_to_worldwide_page_after_successfull_login(){
        $email = "admin@redberry.ge";
        $username = "admin";
        $password = '1234';

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();

        $response = $this->post('login', [
            'login' => $email,
            'password' => $password
        ]);
        $response->assertRedirect('/worldwide');
    }
}
