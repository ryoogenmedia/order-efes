<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    public static function  getLayanan(): array
    {
        return
            [
                [
                    'title' => 'tenaga ahli',
                    'description' => 'Kami mengandalkan tenaga ahli yang berpengalaman di bidang digital Printing & Advertising.',
                    'icon' => 'ri-user-star-line'
                ],
                [
                    'title' => 'Pelayanan Profesional',
                    'description' => 'Kita mengutamakan kenyamanan dan kepuasan Customer.',
                    'icon' => 'ri-star-fill'
                ],

                [
                    'title' => 'Pelayanan Baik',
                    'description' => 'Kami memiliki tenaga ahli yang siap membantu jika ada kendala yang perlu di tanyakan.',
                    'icon' => 'ri-user-voice-fill'
                ],

                [
                    'title' => 'Keterampilan teknis',
                    'description' => 'Kami selalu siap melayani apabila ada pertanyaan maupun kendala.',
                    'icon' => 'ri-settings-fill'
                ],
                [
                    'title' => 'Direkomendasikan',
                    'description' => 'Karena kami siap melayani anda dengan kepuasan, kenyamanan, kualitas dan kuantitas.',
                    'icon' => 'ri-map-pin-user-fill'
                ],
                [
                    'title' => 'Ulasan Positif',
                    'description' => 'Banyak testimoni dari customer kami yang puas atas pelayanan dan kinerja kami.',
                    'icon' => 'ri-planet-fill'
                ],
            ];
    }
}
