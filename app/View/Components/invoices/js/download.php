<?php

namespace App\View\Components\invoices\js;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class download extends Component
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
        return view('components.invoices.js.download');
    }
}
