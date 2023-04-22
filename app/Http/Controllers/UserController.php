<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(RegisterUserRequest $request){
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        event(new Registered($user));

        auth()->login($user);
    
        return redirect()->route('verification.notice');
    }
}
