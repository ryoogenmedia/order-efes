<?php

namespace App\View\Components;

use Closure;
use App\Models\Kontak;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class footer extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $navbars = config('navbar');
        $kontak = Kontak::first();
        return view(
            'components.footer',
            [
                'navbars' => $navbars,
                'kontak' => $kontak
            ]
        );
    }
}
