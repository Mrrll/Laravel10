<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public
    $id,
    $class;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $id,
        $class = null
        )
    {
        $this->id = $id;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
