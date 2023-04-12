<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    public $links;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links = [
        [
            'name' => 'Cursos',
            'active' =>  '',
            'icono' => 'fa-solid fa-book fa-lg',
            'icono_color' => '#27aa94',
            'name_collapse' => 'collapseHeightCursos',
            'items' => [
                [
                    'name' => 'Mis Cursos',
                    'route' => route('cursos.mycursos'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-book fa-lg',
                    'icono_color' => '#27aa94',
                ],
                [
                    'name' => 'Crear Cursos',
                    'route' => route('cursos.create'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-book fa-lg',
                    'icono_color' => '#27aa94',
                ]
            ]
        ],
        [
            'name' => 'Blogs',
            'active' =>  '',
            'icono' => 'fa-solid fa-blog fa-lg',
            'icono_color' => '#0ac720',
            'name_collapse' => 'collapseHeightBlogs',
            'items' => [
                [
                    'name' => 'Mis Post',
                    'route' => route('blog.mypost'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-blog fa-lg',
                    'icono_color' => '#0ac720',
                ],
                [
                    'name' => 'Crear Post',
                    'route' => route('blog.create'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-blog fa-lg',
                    'icono_color' => '#0ac720',
                ],
            ]
        ],
        [
            'name' => 'Users',
            'active' =>  '',
            'icono' => 'fa-solid fa-users fa-lg',
            'icono_color' => '#0045bd',
            'name_collapse' => 'collapseHeightUsers',
            'items' => [
                [
                    'name' => 'List Users',
                    'route' => route('users.index'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-users fa-lg',
                    'icono_color' => '#0045bd',
                ],
                [
                    'name' => 'Crear Post',
                    'route' => route('blog.create'),
                    'active' =>  '',
                    'icono' => 'fa-solid fa-users fa-lg',
                    'icono_color' => '#0045bd',
                ],
            ]
        ],
    ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.aside');
    }
}
