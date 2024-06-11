<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk', 'gambar', 'harga', 'keterangan', 'kategori_id'
    ];

    public function kategori(): HasOne
    {
        return $this->hasOne(Kategori::class);
    }

    public function keranjang(): HasMany
    {
        return $this->hasMany(Keranjang::class);
    }
}
