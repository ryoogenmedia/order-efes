<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class testimoni extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $testimoni = [
            [
                'nama' => 'Alessa Diandra',
                'testimoni' => 'Aku suka hasil cetaknya, bersih, mengkilap dan awet. Terima kasih jasacetak',
                'avatar' => 'avatar-2.jpg',
                'alamat' => 'Indonesia , jakarta',
            ],
            [
                'nama' => 'Fery Dermawawn',
                'testimoni' => 'Pelayan yang ramah , hasil yang memuaskan. aku suka dengan jasa cetak ini',
                'avatar' => 'avatar-1.jpg',
                'alamat' => 'Indonesia , Makassar',

            ],
        ];
        return view('components.testimoni', ['testimoni' => $testimoni]);
    }
}
