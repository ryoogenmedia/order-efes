<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('login');
    }

    public function checkoutSingle($id)
    {
        return view('dashboard.checkout.single', ['id' => $id]);
    }

    public function keranjang()
    {
        return view('dashboard.pesan.single');
    }
}
