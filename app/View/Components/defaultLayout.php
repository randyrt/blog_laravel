<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;


class defaultLayout extends AbstractLayout
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
         return view('components.defaut-layout'); 
    }
}
