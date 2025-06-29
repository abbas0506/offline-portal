<?php

namespace App\View\Components\headers;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class admin extends Component
{
    /**
     * Create a new component instance.
     */
    public $page;
    public function __construct($page)
    {
        //
        $this->page = $page;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.headers.admin');
    }
}
