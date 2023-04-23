<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function store(LoginUserRequest $request){
        $fieldType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $request['login'], 'password' => $request['password']), $request['remember']))
        {
            return redirect()->route('worldwide');
        }else{
            throw ValidationException::withMessages([
                'wrong' => __('login.wrong')
            ]);
        }

    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
