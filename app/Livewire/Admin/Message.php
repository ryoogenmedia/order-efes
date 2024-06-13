<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\KontakKami;

class Message extends Component
{
    public $messages;
    public function render()
    {

        $this->messages = KontakKami::all();
        return view('livewire.admin.message');
    }
}
