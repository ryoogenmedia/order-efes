<?php

namespace App\Livewire\Dashboard\Pesan;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Keranjang;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class Single extends Component
{
    use WithFileUploads;

    public function mount()
    {
        $keranjang = Keranjang::all();
        if ($keranjang->isEmpty()) {
            return redirect()->route('dashboard.index');
        }
    }
    public function render()
    {
        $keranjang = Keranjang::all();
        return view(
            'livewire.dashboard.pesan.single',
            [
                'keranjangs' => $keranjang,
            ]
        );
    }

    public function delete($id)
    {
        if (Keranjang::find($id)->delete()) {

            $keranjang = Keranjang::all();
            if ($keranjang->isEmpty()) {
                return redirect()->route('dashboard.index');
            }
            $this->dispatch('keranjang-deleted');
        }
    }
}
