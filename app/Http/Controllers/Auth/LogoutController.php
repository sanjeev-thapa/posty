<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return response()->json(['error' => '400: Bad Request'], 400);
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
