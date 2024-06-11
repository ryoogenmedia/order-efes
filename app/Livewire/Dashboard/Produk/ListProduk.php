<?php

namespace App\Livewire\Dashboard\Produk;

use App\Models\Produk;
use Livewire\Component;
use Livewire\Attributes\On;

class ListProduk extends Component
{
    // public $produks;
    public $kategori_id = '';
    public $produk_id;

    public $perPage = 5;
    public $page = 1;

    public $search = '';
    public function render()
    {
        if ($this->kategori_id == '') {
            $produks = Produk::where('nama_produk', 'like', '%' . $this->search . '%')
                ->paginate($this->perPage);
        } else {
            $produks = Produk::where('kategori_id', $this->kategori_id)
                ->when($this->search, function ($query, $search) {
                    $query->where('nama_produk', 'like', '%' . $search . '%');
                })
                ->paginate($this->perPage, page: $this->page);
        }
        if ($this->produk_id != null) {
            $produkSelected = Produk::find($this->produk_id);
        } else {
            $produkSelected = null;
        }
        return view(
            'livewire.dashboard.produk.list-produk',
            [
                'produks' => $produks,
                'produkSelected' => $produkSelected,
            ]
        );
    }
    #[On('kategori-id-change')]
    public function kategoriChange($id)
    {
        $this->kategori_id = $id;
    }

    #[On('kategori-id-clear')]
    public function kategoriClear()
    {
        $this->pull('kategori_id');
    }
}
