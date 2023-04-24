<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistics;
use Illuminate\Http\Request;

class WorldwideController extends Controller
{
    public function index(){
        $deaths = CovidStatistics::all()->sum('deaths');
        $recovered = CovidStatistics::all()->sum('recovered');
        $confirmed = CovidStatistics::all()->sum('confirmed');
        return view('worldwide', [
            'deaths' => $deaths,
            'recovered' => $recovered,
            "confirmed" => $confirmed
        ]);
    }
}
