<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public $thead, $class, $theadclass, $typetable;
    /**
     * Create a new component instance.
     */
    public function __construct($thead = null, $class = null, $theadclass = null, $typetable = null)
    {
        $this->thead = $thead;
        $this->class = $class;
        $this->theadclass = $theadclass;
        $this->typetable = $typetable;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
