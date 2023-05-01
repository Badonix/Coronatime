<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class VerificationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_should_redirect_to_confirm_page_notice(): void
    {
        $user =  User::factory()->create([
            'email' => 'example@gmail.com',
            'password' => bcrypt("1234")    ,
            'username' => "admina"
        ]);
        $response=$this->actingAs($user)->get(route('verification.notice'));
        $response->assertViewIs('auth.confirm');
    }

    public function test_verify_email()
    {
        $user = User::factory()->create();

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        $response->assertRedirect(route('verification.success'));
        $this->assertNotNull($user->fresh()->email_verified_at);
    }

    public function test_verification_success()
    {

        $response = $this->get(route('verification.success'));
        $response->assertViewIs('verification.success');
    }
}
