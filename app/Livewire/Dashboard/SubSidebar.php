<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class SubSidebar extends Component
{
    protected $listeners = ["keranjang-deleted" => "render", "keranjang-add" => "render"];

    public function render()
    {
        return view('livewire.dashboard.sub-sidebar');
    }
}
