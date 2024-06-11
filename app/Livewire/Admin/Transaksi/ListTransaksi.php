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
    public function setTransaksi_id($id)
    {
        $this->transaksi_id = $id;
    }
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

    public function updateStatus($id)
    {
        $find = Transaksi::find($id);
        if ($find != null) {
            try {
                if ($find->update([
                    'status' => 'sukses'
                ])) {
                    flash()->success('Transaksi berhasil di konfimasi');
                } else {
                    flash()->error('Gagal di Konfimasi');
                }
            } catch (\Exception $e) {
                flash()->error('Internal Server Error');
            }
        } else {
            flash()->error('Not Found');
        }
    }

    public function deleteTransaksi()
    {
        if ($this->transaksi_id == null) {
            flash()->error('Not Found');
            return;
        }
        $find = Transaksi::find($this->transaksi_id);
        if ($find == null) {
            flash()->error('Not Found');
            return;
        }

        try {
            if ($find->delete()) {
                flash()->success('Deleted Success');
            } else {
                flash()->error('Deleted Failed');
            }
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
            $this->pull('transaksi_id');
        }
    }
}
