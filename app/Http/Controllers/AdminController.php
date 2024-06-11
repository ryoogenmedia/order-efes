<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

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

    public function transaksi()
    {
        return view('admin.transaksi.listTransaksi');
    }
    public function transaksiDetail($id)
    {
        return view('admin.transaksi.detailTransaksi', ['id' => $id]);
    }





    public function download($path, $filename)
    {
        $path = public_path('/storage/' . $path . '/' . $filename);
        return response()->download($path);
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('login');
    }
}
