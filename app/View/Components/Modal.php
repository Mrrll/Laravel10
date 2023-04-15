<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public
    $id,
    $title,
    $class,
    $name,
    $model,
    $btndismiss,
    $btndismisscolor,
    $btnaction,
    $btnactioncolor,
    $btnactionroute,
    $btnactionmethod,
    $routeform,
    $methodform,
    $classform,
    $styleform;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $id,
        $title,
        $class = null,
        $name = null,
        $model = null,
        $btndismiss = "Do not continue",
        $btndismisscolor = "btn-secondary",
        $btnaction = "Continue",
        $btnactioncolor = "btn-primary",
        $btnactionroute = null,
        $btnactionmethod = null,
        $routeform = null,
        $methodform = "post",
        $classform = null,
        $styleform = null,
        )
    {
        $this->id = $id;
        $this->title = $title;
        $this->class = $class;
        $this->name = $name;
        $this->model = $model;
        $this->btndismiss = $btndismiss;
        $this->btndismisscolor = $btndismisscolor;
        $this->btnaction = $btnaction;
        $this->btnactioncolor = $btnactioncolor;
        $this->btnactionroute = $btnactionroute;
        $this->btnactionmethod = $btnactionmethod;
        $this->routeform = $routeform;
        $this->methodform = $methodform;
        $this->classform = $classform;
        $this->styleform = $styleform;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
