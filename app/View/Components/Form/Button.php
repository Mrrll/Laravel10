<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public
    $type,
    $color,
    $class,
    $route;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $type = null,
        $color = "primary",
        $class = null,
        $route = null
        )
    {
        $this->type = $type;
        $this->color = $color;
        $this->class = $class;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.button');
    }
}
