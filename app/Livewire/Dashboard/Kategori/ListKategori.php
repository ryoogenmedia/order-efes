<?php

namespace App\Livewire\Dashboard\Kategori;

use Livewire\Component;
use App\Models\Kategori;

class ListKategori extends Component
{
    public $kategoris;
    public $kategori_id;
    public function render()
    {
        $this->kategoris = Kategori::get();
        return view('livewire.dashboard.kategori.list-kategori');
    }
    public function filterClear()
    {
        $this->pull('kategori_id');
        $this->dispatch('kategori-id-clear');
    }

    public function idChange($id)
    {
        $this->kategori_id = $id;
        if ($this->kategori_id != null) {
            $this->dispatch('kategori-id-change',  $this->kategori_id);
        }
    }
}
