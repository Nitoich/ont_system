<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        if(Auth::check()) {
            redirect('/#profile');
        }

        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            redirect('/#login');
        }

        $user = User::where('login', $request->login)->first();

        if ($user) {
            if ($user->password === $request->password) {
                Auth::login($user);
                redirect('/#profile');
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }
}
