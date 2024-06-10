<?php

namespace App\Models;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InformasiPembayaran extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    const STATUS = ['pending', 'completed', 'failed', 'canceled'];

    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class);
    }
}
