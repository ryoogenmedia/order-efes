<?php

namespace App\Livewire\Dashboard\Pesan;

use App\Models\Produk;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Single extends Component
{
    use WithFileUploads;
    public $produk;
    public $produk_id;

    #[Validate('required|min:1|numeric')]
    public $jml_pesan = 1;

    #[Validate('image|max:10024')]
    public $file;
    public $catatan;
    public function mount($id)
    {
        $this->produk = Produk::find($id);
        $this->produk_id = $id;
    }
    public function render()
    {
        return view('livewire.dashboard.pesan.single');
    }

    public function tambahJmlPesan()
    {
        $this->jml_pesan += 1;
    }
    public function kurangiJmlPesan()
    {
        if ($this->jml_pesan > 1) {
            $this->jml_pesan -= 1;
        }
    }

    // public function checkout()
    // {
    //     $this->validate();
    //     $imageName = time() . '_' . uniqid() . '.' . $this->file->getClientOriginalExtension();
    //     $imagePath = $this->gambar->storeAs('pesanan', $imageName, 'public');
    //     $data = [
    //         'jml_pesan' => $this->jml_pesan,
    //         'file' => $imagePath,
    //         'catatan' => $this->catatan
    //     ];
    // }
}
