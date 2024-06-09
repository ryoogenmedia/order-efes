<?php

namespace App\Livewire\Admin\Produk;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;

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

    public $isUpdate = false;

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

    public $produk_id;

    #[On('produk-edit-click')]
    public function edit($id)
    {
        $find = Produk::find($id);
        if ($find != null) {
            $this->produk_id = $find->id;
            $this->isUpdate = true;
            $this->nama_produk = $find->nama_produk;
            $this->harga = $find->harga;
            $this->kategori_id = $find->kategori_id;
            $this->keterangan = $find->keterangan;
            $this->gambar = $find->gambar;
        }
    }

    public $fileUpdate;
    public function update()
    {
        if ($this->fileUpdate != null) {
            // Generate a unique name for the image with original extension
            $imageName = time() . '_' . uniqid() . '.' . $this->fileUpdate->getClientOriginalExtension();

            // Store the uploaded image in the 'public' disk with the generated name
            $imagePath = $this->fileUpdate->storeAs('produk', $imageName, 'public');
            if (Storage::exists($this->gambar)) {
                Storage::delete($this->gambar);
                flash()->success('Delete File Success');
            }
        } else {
            $imagePath = $this->gambar;
        }
        $data = $this->validate([
            'nama_produk' => 'required|min:3',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'gambar' => 'required',
        ]);
        $data['keterangan'] = $this->keterangan;
        $data['gambar'] = $imagePath;
        try {
            Produk::find($this->produk_id)->update($data);
            $this->dispatch('kategori-deleted');
            $this->dispatch('produk-deleted');
            flash()->success('Updated Success');
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
        }
    }
}
