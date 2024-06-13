<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'alamat',
        'email',
        'tlp',
        'fax',
        'bank',
        'atas_nama',
        'rek',
        'facebook',
        'twitter',
        'instagram',
        'tentang',
    ];
}
