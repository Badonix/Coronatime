<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistics;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $stats = CovidStatistics::all();
        $worldwideDeaths = CovidStatistics::all()->sum('deaths');
        $worldwideRecovered = CovidStatistics::all()->sum('recovered');
        $worldwideConfirmed = CovidStatistics::all()->sum('confirmed');
        return view('countries', [
            'stats' => $stats,
            'worldwideDeaths'=>$worldwideDeaths,
            'worldwideRecovered'=>$worldwideRecovered,
            'worldwideConfirmed'=>$worldwideConfirmed
        ]);
    }
}
