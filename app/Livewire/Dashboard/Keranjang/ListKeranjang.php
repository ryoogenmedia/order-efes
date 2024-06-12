<?php

namespace App\Livewire\Dashboard\Keranjang;

use Livewire\Component;
use App\Models\Keranjang;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class ListKeranjang extends Component
{
    protected $listeners = ["keranjang-deleted" => "render"];

    public $keranjangs;
    public function render()
    {
        $this->keranjangs = Auth::user()->keranjang;
        return view('livewire.dashboard.keranjang.list-keranjang');
    }

    public function deleteItem($id)
    {
        if (Keranjang::find($id) == null) {
            flash()->error('Not Found');
            return;
        }
        $find = Keranjang::find($id);
        if ($find->delete()) {
            $this->dispatch('keranjang-deleted');
        } else {
            flash()->error('Failed to Remove Item');
        }
    }

    #[On('keranjang-add')]
    public function addItem($produk_id)
    {
        if ($produk_id == null) {
            flash()->error('Action Failed');
            return;
        }
        $data = [
            'jml_pesan' => 1,
            'produk_id' => $produk_id,
            'user_id' => Auth::user()->id,
        ];
        try {
            Keranjang::create($data);
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        }
    }
}
