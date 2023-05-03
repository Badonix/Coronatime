<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CountryController extends Controller
{
    public function index()
    {

        $stats = CovidStatistics::query();
        $locale = App::getLocale();
        if(request('search')) {
            $stats->where('country->'.$locale, 'like', '%'.request('search').'%');
        }
        if(request('sort_by')) {
            if(request('sort_by') == "country") {
                $stats->orderBy(request('sort_by') . "->" . $locale, request('sort_method'));
            } else {
                $stats->orderBy(request('sort_by'), request('sort_method'));
            }
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
