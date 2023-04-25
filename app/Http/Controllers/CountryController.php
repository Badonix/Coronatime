<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CountryController extends Controller
{
    public function index()
    {
        $stats = CovidStatistics::orderBy("country->" . App::getLocale()); 
        if(request('search')){
            $locale = App::getLocale();
            $stats->where('country->'.$locale, 'like', '%'.request('search').'%');
            
        }
        $worldwideDeaths = CovidStatistics::all()->sum('deaths');
        $worldwideRecovered = CovidStatistics::all()->sum('recovered');
        $worldwideConfirmed = CovidStatistics::all()->sum('confirmed');
        return view('countries', [
            'stats' => $stats->get(),
            'worldwideDeaths'=>$worldwideDeaths,
            'worldwideRecovered'=>$worldwideRecovered,
            'worldwideConfirmed'=>$worldwideConfirmed
        ]);
    }
}
