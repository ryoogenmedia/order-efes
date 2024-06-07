<?php

namespace App\Livewire\Produk;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Kategori;

class Index extends Component
{
    public Kategori $kategoris;
    public Produk $produks;
    public $minCategoryId;

    public $kategoriId;

    public function mount(Kategori $kategoris, Produk $produks)
    {
        $this->kategoris = $kategoris;
        $this->kategoriId = $kategoris->first()->id;
        $this->produks = $produks;
    }
    public function render()
    {
        return view('livewire.produk.index');
    }

    public function changeKategoriId($id)
    {
        $this->kategoriId = $id;
    }
}
