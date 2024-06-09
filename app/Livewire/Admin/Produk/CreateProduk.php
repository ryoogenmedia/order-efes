<?php

namespace App\Livewire\Admin\Produk;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class CreateProduk extends Component
{
    use WithFileUploads;
    public $kategoris;

    #[Validate('required|min:3')]
    public $nama_produk = '';

    #[Validate('required|numeric')]
    public $harga = '';

    public $keterangan = '';

    #[Validate('required|numeric')]
    public $kategori_id = '';

    #[Validate('image|max:10024')] //max 10 mb
    public $gambar;

    public function mount(Kategori $kategoris)
    {
        $this->kategoris = $kategoris->get();
    }
    public function render()
    {
        return view('livewire.admin.produk.create-produk');
    }

    public function save()
    {
        $this->validate();

        // Generate a unique name for the image with original extension
        $imageName = time() . '_' . uniqid() . '.' . $this->gambar->getClientOriginalExtension();

        // Store the uploaded image in the 'public' disk with the generated name
        $imagePath = $this->gambar->storeAs('produk', $imageName, 'public');

        $data = [
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
            'kategori_id' => $this->kategori_id,
            'keterangan' => $this->keterangan,
            'gambar' => $imagePath,
        ];
        try {
            if (Produk::create($data)) {
                flash()->success('Produk Created');
            } else {
                flash()->error('Created Failed');
            }
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
            $this->pull([
                'nama_produk', 'harga', 'keterangan', 'gambar'
            ]);
        }
    }
}
