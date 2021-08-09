<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.register');
    }

    public function store(RegisterRequest $request){
        User::create($request->validated());
        auth()->attempt($request->only('username', 'password'));
        return redirect()->route('dashboard');
    }
}
