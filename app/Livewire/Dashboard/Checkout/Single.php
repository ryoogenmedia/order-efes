<?php

namespace App\Livewire\Dashboard\Checkout;

use App\Models\Kontak;
use App\Models\Ongkir;
use App\Models\Produk;
use Livewire\Component;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\DetailTransaksi;
use Livewire\Attributes\Validate;
use App\Models\InformasiPembayaran;
use Illuminate\Support\Facades\Auth;

class Single extends Component
{
    use WithFileUploads;
    public Ongkir $ongkirs;
    public kontak $kontak;
    public $isFinish = false;
    public $produk;
    public $produk_id;

    public $step = [
        1 => 'disabled',
        2 => 'disabled',
        3 => 'disabled',
    ];

    // DETAIL TRANSAKSI
    #[Validate('required|min:1')]
    public $jml_pesan = 1;

    #[Validate('image|max:10024')]
    public $file;
    public $catatan;


    // ONGKIR
    public $biayaOngkir = 0;
    public $provinsi = '';
    public $kota = '';
    public $metode = '';
    public $kecamatan = '';

    // Transaksi
    public $total;
    public $alamat = '';

    // Informasi Pembayaran
    #[Validate('required')]
    public $nama_bank;
    #[Validate('required')]
    public $nama_akun;
    #[Validate('required')]
    public $no_rek;

    #[Validate('image|max:10024')]
    public $file_bukti;
    public $status = 'Sukses';

    public function mount($id, Ongkir $ongkir, Kontak $kontak)
    {
        $this->produk_id = $id;
        $this->produk = Produk::find($this->produk_id);
        $this->ongkirs = $ongkir;
        $this->kontak = $kontak->first();
    }

    public function render()
    {
        if ($this->provinsi != '') {
            $this->biayaOngkir = Ongkir::where('provinsi', 'like', '%' . $this->provinsi . '%')->first()->harga;
        } else {
            $this->pull('biayaOngkir');
        }
        $this->total = ($this->produk->harga * $this->jml_pesan) + $this->biayaOngkir;
        return view('livewire.dashboard.checkout.single');
    }

    // jml_pesanan
    public function tambahJmlPesan()
    {
        $this->jml_pesan += 1;
    }
    public function kurangiJmlPesan()
    {
        if ($this->jml_pesan > 1) {
            $this->jml_pesan -= 1;
        }
    }

    public $kode_transaksi;
    public function createTransaction()
    {
        $this->validate();
        try {
            $this->kode_transaksi = 'TRX-' . Str::uuid();
            $transaksi = Transaksi::create([
                'kode_transaksi' => $this->kode_transaksi,
                'alamat' => $this->alamat,
                'total' => $this->total,
                'resi' => 'tidak ada',
                'ongkir_id' => Ongkir::where('provinsi', 'like', '%' . $this->provinsi . '%')->first()->id,
                'user_id' => Auth::user()->id
            ]);
            if ($transaksi != null) {
                $id = $transaksi->id;
                $fileBuktiName = time() . '_' . uniqid() . '.' . $this->file_bukti->getClientOriginalExtension();
                $file_bukti = $this->file_bukti->storeAs('buktiPembayaran', $fileBuktiName, 'public');

                InformasiPembayaran::create([
                    'nama_bank' => $this->nama_bank,
                    'nama_akun' => $this->nama_akun,
                    'no_rek' => $this->no_rek,
                    'file_bukti' => $file_bukti,
                    'status' => 'completed',
                    'transaksi_id' => $id,
                ]);
                $fileName = time() . '_' . uniqid() . '.' . $this->file->getClientOriginalExtension();
                $file = $this->file->storeAs('desain', $fileName, 'public');

                DetailTransaksi::create([
                    'jml_pesanan' => $this->jml_pesan,
                    'desain' => $file,
                    'catatan' => $this->catatan,
                    'produk_id' => $this->produk_id,
                    'transaksi_id' => $id,
                ]);

                Keranjang::where(['user_id' => Auth::user()->id, 'produk_id' => $this->produk_id])->delete();
                $this->dispatch('keranjang-deleted');
            }
            $this->isFinish = true;
            flash()->success('Ordering Success');
        } catch (\Exception $e) {
            flash()->error("Terjadi kesalahan: " . $e->getMessage());
        }
    }
}
