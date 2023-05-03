<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('verification.success');
    }

    public function success()
    {
        auth()->logout();
        return view('verification.success');
    }
}
