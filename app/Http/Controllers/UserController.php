<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        dd(Auth::guard('web'));
    }

    public function logout()
    {
        auth()->guard('web')->logout();
    }
}
