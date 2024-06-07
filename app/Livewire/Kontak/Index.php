<?php

namespace App\Livewire\Kontak;

use App\Models\Kontak;
use Livewire\Component;

class Index extends Component
{
    public Kontak $kontak;
    public function mount(Kontak $kontak)
    {
        $this->kontak = $kontak->first();
    }
    public function render()
    {
        return view('livewire.kontak.index');
    }
}
