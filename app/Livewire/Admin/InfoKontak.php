<?php

namespace App\Livewire\Admin;

use App\Models\Kontak;
use Livewire\Attributes\Validate;
use Livewire\Component;

class InfoKontak extends Component
{
    public Kontak $kontak;

    public $id;

    #[Validate('required')]
    public $alamat;
    #[Validate('required')]
    public $email;
    #[Validate('required')]
    public $tlp;
    #[Validate('required')]
    public $fax;
    #[Validate('required')]
    public $bank;
    #[Validate('required')]
    public $atas_nama;
    #[Validate('required')]
    public $rek;
    #[Validate('required')]
    public $facebook;
    #[Validate('required')]
    public $instagram;
    #[Validate('required')]
    public $twitter;

    public function mount(Kontak $kontak)
    {
        $this->kontak = $kontak->first();
        $this->id = $this->kontak->id;
        $this->alamat = $this->kontak->alamat;
        $this->email = $this->kontak->email;
        $this->tlp = $this->kontak->tlp;
        $this->fax = $this->kontak->fax;
        $this->bank = $this->kontak->bank;
        $this->atas_nama = $this->kontak->atas_nama;
        $this->rek = $this->kontak->rek;
        $this->facebook = $this->kontak->facebook;
        $this->twitter = $this->kontak->twitter;
        $this->instagram = $this->kontak->instagram;
    }
    public function render()
    {
        return view('livewire.admin.info-kontak');
    }

    public function updatePembayaran()
    {
        $this->validate();
        $data = [
            'bank' => $this->bank,
            'atas_nama' => $this->atas_nama,
            'rek' => $this->rek
        ];

        try {
            if ($this->kontak->update($data)) {
                flash()->success('updated');
            } else {
                flash()->error('updated failed');
            }
        } catch (\Exception $e) {
            flash()->error('updated failed');
        }
    }
    public function updateSocial()
    {
        $this->validate();
        $data = [
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram
        ];

        try {
            if ($this->kontak->update($data)) {
                flash()->success('updated');
            } else {
                flash()->error('updated failed');
            }
        } catch (\Exception $e) {
            flash()->error('updated failed');
        }
    }
    public function updateKontak()
    {
        $this->validate();
        $data = [
            'email' => $this->email,
            'tlp' => $this->tlp,
            'fax' => $this->fax,
            'alamat' => $this->alamat,
        ];

        try {
            if ($this->kontak->update($data)) {
                flash()->success('updated');
            } else {
                flash()->error('updated failed');
            }
        } catch (\Exception $e) {
            flash()->error('updated failed');
        }
    }
}
