<?php

namespace App\Livewire\Admin\Transaksi;

use App\Models\InformasiPembayaran;
use Livewire\Component;
use App\Models\Transaksi;

class DetailTransaksi extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        return view(
            'livewire.admin.transaksi.detail-transaksi',
            [
                'transaksi' => Transaksi::where('id', $this->id)->first(),
                'InformasiPembayaran' => InformasiPembayaran::where('transaksi_id', $this->id)->first(),
            ]
        );
    }
}
