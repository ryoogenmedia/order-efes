<?php

namespace App\Livewire\Admin\Produk;

use App\Models\Kategori;
use Livewire\Component;

class ListKategori extends Component
{
    public $kategoris;
    public $kategori_id = '';
    public $search = '';


    public function mount(Kategori $kategori)
    {
        $this->kategoris = $kategori->where('nama_kategori', 'like', '%' . $this->search . '%')->get();
    }

    public function changeId($id)
    {
        $this->kategori_id = $id;
        $this->dispatch('kategori-change', $this->kategori_id);
    }

    public function render()
    {
        return view('livewire.admin.produk.list-kategori');
    }
}
