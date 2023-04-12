<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public
    $type,
    $id,
    $name,
    $placeholder,
    $label,
    $class,
    $value;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $type,
        $id,
        $name = null,
        $placeholder = null,
        $label = "Example",
        $class = null,
        $value = null
        )
    {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->class = $class;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
