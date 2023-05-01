<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function update(Request $request)
    {
        session(['locale' => $request->locale]);
        return back();
    }
}
