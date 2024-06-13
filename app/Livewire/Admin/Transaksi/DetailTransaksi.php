<?php

namespace App\Livewire\Admin\Transaksi;

use Livewire\Component;
use App\Models\Transaksi;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\InformasiPembayaran;

class DetailTransaksi extends Component
{
    use WithFileUploads;
    public $id;
    #[Validate('required|image|max:10024')]
    public $file;
    #[Validate('required')]
    public $resi;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        return view(
            'livewire.admin.transaksi.detail-transaksi',
            [
                'transaksi' => Transaksi::find($this->id),
                'InformasiPembayaran' => InformasiPembayaran::where('transaksi_id', $this->id)->first(),
            ]
        );
    }

    public function konfirmasi()
    {
        $this->validate();
        // Generate a unique name for the image with original extension
        $imageName = time() . '_' . uniqid() . '.' . $this->file->getClientOriginalExtension();

        // Store the uploaded image in the 'public' disk with the generated name
        $imagePath = $this->file->storeAs('buktiPengiriman', $imageName, 'public');
        $data = [
            'resi' => $this->resi,
            'bukti_kirim' => $imagePath,
            'status' => 'pengiriman'
        ];
        try {
            if (Transaksi::find($this->id)->update($data)) {
                flash()->success('Bukti Pengiriman Berhasil di Upload');
            } else {
                flash()->error('Bukti Pengiriman Gagal di Upload');
            }
        } catch (\Exception $e) {
            flash()->error('Internal Server Error');
        }
    }

    public function updateStatus()
    {
        try {
            if (Transaksi::find($this->id)->update(['status' => 'pembuatan'])) {

                flash()->success('berhasil di konfirmasi');
            } else {
                flash()->error('gagal di konfimaasi ');
            }
        } catch (\Exception $e) {
            flash()->error('gagal di konfimaasi , internal server error');
        }
    }
}
