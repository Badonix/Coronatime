<?php

namespace Tests\Feature;

use App\Models\CovidStatistics;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    public function test_fetch_command_to_write_data_in_stats_table(): void
    {
        Http::fake([
            'https://devtest.ge/countries' => Http::response([
                [
                    'code' => 'AF',
                    'name' => [
                        'en' => "Afghanistan",
                        'ka' => "ავღანეთი"
                    ]
                ]
            ]),
            'https://devtest.ge/get-country-statistics' => Http::response([

                    "id"=> 30,
                    "country"=> "Afghanistan",
                    "code"=> "AF",
                    "confirmed"=> 1234,
                    "recovered"=> 4321,
                    "critical"=> 5121,
                    "deaths"=> 2341,
                    "created_at"=> "2022-02-13T18:17:01.000000Z",
                    "updated_at"=> "2023-04-30T00:00:05.000000Z"

            ], 200),
        ]);
        $this->artisan('coronatime:fetch-covid-stats')
        ->expectsOutput('Covid stats updated successfully.');

        $this->assertDatabaseHas('covid_statistics', [
            'code' => 'AF',
        ]);

    }
    public function test_fetch_command_to_update_data_in_stats_table_if_it_already_exists(): void
    {

        CovidStatistics::factory()->create([
            'code' => "AF"
        ]);

        Http::fake([
            'https://devtest.ge/countries' => Http::response([
                [
                    'code' => 'AF',
                    'name' => [
                        'en' => "Afghanistan",
                        'ka' => "ავღანეთი"
                    ]
                ]
            ]),
            'https://devtest.ge/get-country-statistics' => Http::response([

                    "id"=> 30,
                    "country"=> "Afghanistan",
                    "code"=> "AF",
                    "confirmed"=> 1234,
                    "recovered"=> 4321,
                    "critical"=> 5121,
                    "deaths"=> 2341,
                    "created_at"=> "2022-02-13T18:17:01.000000Z",
                    "updated_at"=> "2023-04-30T00:00:05.000000Z"

            ], 200),
        ]);
        $this->artisan('coronatime:fetch-covid-stats')
        ->expectsOutput('Covid stats updated successfully.');

        $this->assertDatabaseHas('covid_statistics', [
            'code' => 'AF',
        ]);

    }
}
