<?php

namespace App\Livewire\Admin\Produk;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\On;

class ListProduk extends Component
{
    public $produks;
    public Kategori $kategoris;
    public $kategori_id = '';

    protected $listeners = ['kategori-change' => 'changeId'];

    #[On('kategori-deleted')]
    public function kategoriDelete()
    {
        $this->render();
    }
    public function changeId($id)
    {
        $this->kategori_id = $id;
        $this->produks = Produk::where('kategori_id', 'like', $this->kategori_id)->get();
        $this->render();
    }

    public function mount(Produk $produk, Kategori $kategori)
    {
        $this->kategoris = $kategori;
        $this->produks = $this->kategori_id ?
            $produk::where('kategori_id', 'like', $this->kategori_id)->get() :
            $produk->all();
    }

    public function render()
    {
        return view('livewire.admin.produk.list-produk', [
            'produks' => $this->produks,
            'kategoris' => $this->kategoris
        ]);
    }

    public function remove($id)
    {
        $find = Produk::find($id);
        if ($find != null) {
            try {
                $find->delete();
                $this->dispatch('produk-deleted');
                flash()->success('Deleted Success');
            } catch (\Exception $e) {
                flash()->error('Deleted Failed');
            }
        } else {

            flash()->error('Not Found');
        }
    }

    public function editClik($id)
    {
        $this->dispatch('produk-edit-click', $id);
    }
}
