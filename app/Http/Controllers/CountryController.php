<?php

namespace App\Http\Controllers;

use App\Models\CovidStatistics;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(){
        $stats = CovidStatistics::all();
        return view('countries', [
            'stats' => $stats
        ]);
    }
}
