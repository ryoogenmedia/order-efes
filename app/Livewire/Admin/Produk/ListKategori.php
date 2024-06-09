<?php

namespace App\Livewire\Admin\Produk;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class ListKategori extends Component
{
    public $kategoris;
    public $kategori_id = '';
    public $search = '';

    #[Validate('required|min:3')]
    public $nama_kategori = '';

    protected $listeners = ['produk-deleted' => 'render'];


    public function mount(Kategori $kategori)
    {
        $this->kategoris = $kategori->where('nama_kategori', 'like', '%' . $this->search . '%')->with('produk')->get();
    }

    public function changeId($id)
    {
        $this->kategori_id = $id;
        $this->dispatch('kategori-change', $this->kategori_id);
    }

    #[On(['kategori-created', 'kategori - deleted'])]
    public function kategoriCreated()
    {
        $this->render();
    }
    public function render()
    {
        $this->kategoris = Kategori::where('nama_kategori', 'like', '%' . $this->search . '%')->with('produk')->get();

        return view('livewire.admin.produk.list-kategori');
    }

    public function newKategori()
    {
        $data = $this->validate();
        try {
            Kategori::create($data);
            flash()->success("Kategori Created");
            $this->dispatch('kategori-created', $this->kategori_id);
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
            $this->pull('nama_kategori');
        }
    }

    public function deleteKategori($id)
    {
        $find = Kategori::find($id);
        if ($find != null) {
            try {
                $find->delete();
                $this->dispatch('kategori-deleted');
                flash()->success("Deleted");
            } catch (\Exception $e) {
                flash()->error('Internal Server Error');
            }
        } else {
            flash()->error('Not Found');
        }
    }

    public $isUpdate = false;
    public function editKategori($id)
    {
        $find = Kategori::find($id);
        if ($find != null) {
            try {
                $this->kategori_id = $id;
                $this->isUpdate = true;
                $this->nama_kategori = $find->nama_kategori;
            } catch (\Exception $e) {
                flash()->error('Internal Server Error');
            }
        } else {
            flash()->error('Not Found');
        }
    }

    public function updateKategori()
    {
        $data = $this->validate();
        try {
            Kategori::find($this->kategori_id)->update($data);
            flash()->success("Kategori Updated");
            $this->dispatch('kategori-deleted', $this->kategori_id);
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
            $this->pull('nama_kategori');
            $this->pull('isUpdate');
        }
    }
}
