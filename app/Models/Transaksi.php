<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ongkir;
use App\Models\DetailTransaksi;
use App\Models\InformasiPembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function detailTransaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
    public function informasiPembayaran(): HasOne
    {
        return $this->hasOne(InformasiPembayaran::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ongkir(): BelongsTo
    {
        return $this->belongsTo(Ongkir::class);
    }
}
