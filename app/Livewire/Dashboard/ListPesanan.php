<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class ListPesanan extends Component
{
    public $transaksis;

    public $status = '';
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function render()
    {
        $this->transaksis = Auth::user()->transaksi;
        return view(
            'livewire.dashboard.list-pesanan',
            [
                'enumStatus' => Transaksi::STATUS,
            ]
        );
    }
}
