<?php

namespace App\View\Components\admin;

use Closure;
use App\Models\Transaksi;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class widget extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.widget', [
            'transaksi' => Transaksi::get(),
            'dikerjakan' => Transaksi::where('status', 'pembuatan')->count(),
            'dikirim' => Transaksi::where('status', 'pengiriman')->count(),
            'selesai' => Transaksi::where('status', 'sukses')->count(),
        ]);
    }
}
