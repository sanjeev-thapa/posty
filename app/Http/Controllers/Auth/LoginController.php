<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        return auth()->attempt($request->only('username', 'password'), $request->remember)
        ? redirect()->intended()
        : back()->with('status', 'Invalid Login Details');
    }
}
