<?php

namespace App\Livewire\Admin\Transaksi;

use App\Models\User;
use App\Models\Ongkir;
use App\Models\Produk;
use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithPagination;
use App\Models\DetailTransaksi;

class ListTransaksi extends Component
{
    use WithPagination;
    public  $transaksis;
    public  $transaksi_id;
    public  $users;
    public  $ongkirs;
    public  $detailTransaksis;
    public  $produks;

    public $search = '';
    public $status = '';
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function mount(DetailTransaksi $detailTransaksi, User $user, Ongkir $ongkir, Produk $produk)
    {
        $this->users = $user;
        $this->ongkirs = $ongkir;
        $this->detailTransaksis = $detailTransaksi;
        $this->produks = $produk;
    }
    public function render()
    {

        $this->transaksis = Transaksi::with(['detailTransaksi', 'informasiPembayaran', 'user', 'ongkir'])
            ->when($this->search, function ($query) {
                $query->where('kode_transaksi', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                $query->where('status', 'like', '%' . $this->status . '%');
            })
            ->latest()
            ->get();

        return view('livewire.admin.transaksi.list-transaksi', [
            'enumStatus' => Transaksi::STATUS,
        ]);
    }
}
