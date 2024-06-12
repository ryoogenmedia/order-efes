<?php

namespace App\Livewire\Dashboard;

use App\Models\Kontak;
use Livewire\Component;
use App\Models\Testimoni;
use App\Models\Transaksi;
use App\Models\InformasiPembayaran;
use Illuminate\Support\Facades\Auth;

class DetailPesanan extends Component
{
    public $id;
    public $testimoni;
    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        return view('livewire.dashboard.detail-pesanan', [
            'kontak' => Kontak::first(),
            'transaksi' => Transaksi::find($this->id),
            'InformasiPembayaran' => InformasiPembayaran::where('transaksi_id', $this->id)->first(),
        ]);
    }

    public function konfirmasi()
    {
        try {
            Testimoni::create([
                'is_show' => false,
                'testimoni' => $this->testimoni,
                'user_id' => Auth::user()->id
            ]);

            if (Transaksi::find($this->id)->update(['status' => 'sukses'])) {


                flash()->success('Penerimaan Telah Di Konfirmasi');
                return redirect()->route('dashboard.pesanan');
            }
        } catch (\Exception $e) {
            dd($e);
            flash()->error('Operation Failed' . $e);
        }
    }
}
