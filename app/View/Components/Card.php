<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $style, $class, $classheader, $classfooter;
    /**
     * Create a new component instance.
     */
    public function __construct($style = null, $class = null, $classheader = null, $classfooter = null)
    {
        $this->style = $style;
        $this->class = $class;
        $this->classheader = $classheader;
        $this->classfooter = $classfooter;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
