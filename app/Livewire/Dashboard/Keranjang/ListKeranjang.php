<?php

namespace App\Livewire\Dashboard\Keranjang;

use Livewire\Component;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

class ListKeranjang extends Component
{
    protected $listeners = ["keranjang-deleted" => "render", "keranjang-add" => "render"];

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
}
