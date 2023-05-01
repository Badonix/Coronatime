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

        CovidStatistics::factory()->create([
            'code' => "GE",
            'country' => json_encode(['en' => "Georgia", 'ka' => "საქართველო"]),
        ]);

        CovidStatistics::factory()->create([
            'code' => "DE",
            'country' => json_encode(['en' => "Germany", 'ka' => "გერმანია"]),
        ]);
        CovidStatistics::factory()->create([
            'code' => "GR",
            'country' => json_encode(['en' => "Greece", 'ka' => "საბერძნეთი"]),
        ]);
    }

    public function test_should_redirect_to_login_page_if_not_logged_in(){
        $response = $this->get(route('countries'));
        $response->assertRedirect(route('login'));
    }

    public function test_should_show_countries_page_if_logged_in(){
        $response = $this->actingAs($this->user)->get('/countries');
        $response->assertViewIs('countries');
    }

    public function test_country_controller_returns_correct_data_when_sorting_by_recovered_descending()
    {
        $response = $this->actingAs($this->user)->get(route('countries', [
            'search' => 'Ge',
            'sort_by' => 'recovered',
            'sort_method' => 'desc',
        ]));
        $stats = $response->original->getData()['stats'];
        $this->assertGreaterThan($stats[1]['recovered'], $stats[0]['recovered']);
    }
    public function test_country_controller_returns_correct_data_when_sorting_by_deaths_descending()
    {
        $response = $this->actingAs($this->user)->get(route('countries', [
            'search' => 'Ge',
            'sort_by' => 'deaths',
            'sort_method' => 'desc',
        ]));
        $stats = $response->original->getData()['stats'];
        $this->assertGreaterThan($stats[1]['deaths'], $stats[0]['deaths']);
    }
    public function test_country_controller_returns_correct_data_when_sorting_by_confirmed_descending()
    {
        $response = $this->actingAs($this->user)->get(route('countries', [
            'search' => 'Ge',
            'sort_by' => 'confirmed',
            'sort_method' => 'desc',
        ]));
        $stats = $response->original->getData()['stats'];
        $this->assertGreaterThan($stats[1]['confirmed'], $stats[0]['confirmed']);
    }


    public function test_country_controller_returns_correct_data_when_sorting_by_recovered_ascending()
    {
        $response = $this->actingAs($this->user)->get(route('countries', [
            'search' => 'Ge',
            'sort_by' => 'recovered',
            'sort_method' => 'asc',
        ]));
        $stats = $response->original->getData()['stats'];
        $this->assertGreaterThan($stats[0]['recovered'], $stats[1]['recovered']);
    }
    public function test_country_controller_returns_correct_data_when_sorting_by_deaths_ascending()
    {
        $response = $this->actingAs($this->user)->get(route('countries', [
            'search' => 'Ge',
            'sort_by' => 'deaths',
            'sort_method' => 'asc',
        ]));
        $stats = $response->original->getData()['stats'];
        $this->assertGreaterThan($stats[0]['deaths'], $stats[1]['deaths']);
    }
    public function test_country_controller_returns_correct_data_when_sorting_by_confirmed_ascending()
    {
        $response = $this->actingAs($this->user)->get(route('countries', [
            'search' => 'Ge',
            'sort_by' => 'confirmed',
            'sort_method' => 'asc',
        ]));
        $stats = $response->original->getData()['stats'];
        $this->assertGreaterThan($stats[0]['confirmed'], $stats[1]['confirmed']);
    }
    
    public function test_country_controller_returns_correct_data_when_sorting_alphabetically_descending(){
        $response = $this->actingAs($this->user)->get(route('countries', [
            'search' => 'Ge',
            'sort_by' => 'country',
            'sort_method' => 'desc',
        ]));
        $stats = $response->original->getData()['stats'];

        $this->assertEquals('Georgia', json_decode($stats[1]['country'])->en);
        $this->assertEquals('Germany', json_decode($stats[0]['country'])->en);
    }
    public function test_country_controller_returns_correct_data_when_sorting_alphabetically_ascending(){
        $response = $this->actingAs($this->user)->get(route('countries', [
            'search' => 'Ge',
            'sort_by' => 'country',
            'sort_method' => 'asc',
        ]));
        $stats = $response->original->getData()['stats'];

        $this->assertEquals('Georgia', json_decode($stats[0]['country'])->en);
        $this->assertEquals('Germany', json_decode($stats[1]['country'])->en);
    }
}
