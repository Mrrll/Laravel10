<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type, $route, $class, $method;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $route, $class, $method = null)
    {
        $this->type = $type;
        $this->route = $route;
        $this->class = $class;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.button');
    }
}
