<?php

namespace App\Livewire\Admin\Ongkir;

use App\Models\Ongkir;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ListOngkir extends Component
{


    protected $listeners = (['ongkir-created' => 'render']);

    #[Validate('required')]
    public $ongkir_id;

    #[Validate('required')]
    public $provinsi = '';

    #[Validate('required')]
    public $kota = '';

    #[Validate('required')]
    public $kecamatan = '';

    #[Validate('required')]
    public $metode = '';
    #[Validate('required|numeric')]
    public $harga = '';

    public $isUpdate = false;
    public $modalTitle = 'Create new Ongkir';

    public function closeModal()
    {
        $this->pull([
            'isUpdate', 'modalTitle',
            'provinsi', 'kota', 'kecamatan', 'metode', 'harga'
        ]);
    }
    public function editKlik($id)
    {
        $this->isUpdate = true;
        $this->modalTitle = 'Update Ongkir';
        $find = Ongkir::find($id);
        if ($find != null) {
            $this->ongkir_id = $find->id;
            $this->provinsi = $find->provinsi;
            $this->kota = $find->kota;
            $this->kecamatan = $find->kecamatan;
            $this->metode = $find->metode;
            $this->harga = $find->harga;
        }
    }

    public function render()
    {
        return view(
            'livewire.admin.ongkir.list-ongkir',
            [
                'ongkirs' => Ongkir::orderBy('id', 'desc')->get(),
            ]
        );
    }

    public function create()
    {
        $this->validate();
        $data = [
            'provinsi' => $this->provinsi,
            'kota' => $this->kota,
            'kecamatan' => $this->kecamatan,
            'metode' => $this->metode,
            'harga' => $this->harga,
        ];

        try {
            Ongkir::create($data);
            flash()->success('Created Success');
            $this->dispatch('ongkir-created');
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
            $this->closeModal();
        }
    }

    public function update()
    {
        $this->validate();
        $data = [
            'provinsi' => $this->provinsi,
            'kota' => $this->kota,
            'kecamatan' => $this->kecamatan,
            'metode' => $this->metode,
            'harga' => $this->harga,
        ];

        try {
            Ongkir::find($this->ongkir_id)->update($data);
            flash()->success('Updated Success');
            $this->dispatch('ongkir-created');
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
            $this->closeModal();
        }
    }

    public function remove($id)
    {
        try {
            Ongkir::find($id)->delete();
            flash()->success('Delete Success');
            $this->dispatch('ongkir-created');
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        } finally {
            $this->closeModal();
        }
    }
}
