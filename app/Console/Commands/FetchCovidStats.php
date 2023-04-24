<?php

namespace App\Console\Commands;

use App\Models\CovidStatistics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCovidStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-covid-stats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $countryCodes = Http::get('https://devtest.ge/countries')->json();

        foreach($countryCodes as $countryCode) {
            $response = Http::post('https://devtest.ge/get-country-statistics', [
                'code' => $countryCode['code']
            ]);

            $stats = $response->json();
            $stats['country'] = json_encode($countryCode['name']);

            unset($stats['id']);

            $existingStats = CovidStatistics::where('code', $stats['code'])->first();
            if ($existingStats) {
                $existingStats->update($stats);
            } else {
                CovidStatistics::create($stats);
            }
        }
    }
}
