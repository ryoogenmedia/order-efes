<?php

namespace App\Livewire\Kontak;

use App\Models\Kontak;
use Livewire\Component;
use App\Models\KontakKami;
use Livewire\Attributes\Validate;

class Index extends Component
{
    public  $kontak;

    #[Validate('required')]
    public $nama = '';
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required')]
    public $subjek = '';
    #[Validate('required')]
    public $pesan = '';
    public function mount(Kontak $kontak)
    {
        $this->kontak = $kontak->first();
    }
    public function render()
    {
        return view('livewire.kontak.index');
    }

    public function sendMessage()
    {
        $this->validate();

        try {
            KontakKami::create([
                'nama' => $this->nama,
                'email' => $this->email,
                'subjek' => $this->subjek,
                'pesan' => $this->pesan,
            ]);
            flash()->success('Message Send');
        } finally {
            $this->pull(['nama', 'email', 'pesan', 'subjek']);
        }
    }
}
