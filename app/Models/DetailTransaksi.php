<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jml_pesanan',
        'desain',
        'file',
        'catatan',
        'produk_id',
        'transaksi_id',
    ];
    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function produk(): BelongsTo
    {
        return $this->BelongsTo(Produk::class);
    }
}
