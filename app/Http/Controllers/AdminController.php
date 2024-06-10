<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function produk_list()
    {
        return view('admin.produk.index');
    }

    public function produk_create()
    {
        return view('admin.produk.create');
    }

    public function metodePengiriman()
    {
        return view('admin.ongkir.list');
    }

    public function userList()
    {
        return view('admin.user.listUser');
    }


    public function logout()
    {
        auth()->guard('admin')->logout();
    }
}
