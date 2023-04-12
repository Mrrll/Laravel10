<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    public
    $route,
    $method,
    $class,
    $style;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $route,
        $method = "post",
        $class = null,
        $style = null
        )
    {
        $this->route = $route;
        $this->method = $method;
        $this->class = $class;
        $this->style = $style;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
