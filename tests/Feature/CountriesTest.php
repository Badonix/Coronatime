<?php

namespace Tests\Feature;

use App\Models\CovidStatistics;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountriesTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $email = "admin@redberry.ge";
        $username = "admin";
        $password = '1234';

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();

        $this->user = $user;

        CovidStatistics::create([
            'code' => "GE",
            'country' => json_encode(['en' => "Georgia", 'ka' => "საქართველო"]),
            'confirmed' => 5103,
            'recovered' => 1750,
            'critical' => 13,
            'deaths' => 582
        ]);

        CovidStatistics::create([
            'code' => "DE",
            'country' => json_encode(['en' => "Germany", 'ka' => "გერმანია"]),
            'confirmed' => 4001,
            'recovered' => 5019,
            'critical' => 51,
            'deaths' => 519
        ]);
        CovidStatistics::create([
            'code' => "GR",
            'country' => json_encode(['en' => "Greece", 'ka' => "საბერძნეთი"]),
            'confirmed' => 4193,
            'recovered' => 1283,
            'critical' => 41,
            'deaths' => 987
        ]);
    }

    public function test_should_redirect_to_login_page_if_not_logged_in(){
        $response = $this->get('/countries');
        $response->assertRedirect('/login');
    }

    public function test_should_show_countries_page_if_logged_in(){
        $response = $this->actingAs($this->user)->get('/countries');
        $response->assertViewIs('countries');
    }

    public function test_country_controller_returns_correct_data(){
        $response = $this->actingAs($this->user)->get('/countries?search=Ge&sort_by=recovered&sort_method=desc');
        $stats = $response->original->getData()['stats'];
        dump($stats);
    }

}
