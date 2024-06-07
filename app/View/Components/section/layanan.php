<?php

namespace App\View\Components\section;

use Closure;
use App\Models\Layanan as modelLayanan;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class layanan extends Component
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
        $layanan = modelLayanan::getLayanan();
        return view('components.section.layanan', ['layanans' => $layanan]);
    }
}
