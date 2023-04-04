<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $links_pages, $links_users, $links_auths;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
    $this->links_pages = [
            [
                'name' => 'Home',
                'route' => route('home'),
                'active' => request()->routeIs('home') ? 'active disabled' : '',
                'icono' => 'fa-solid fa-house fa-lg',
                'icono_color' => '#1100ff'
            ],
            [
                'name' => 'Cursos',
                'route' => route('cursos.index'),
                'active' => request()->routeIs('cursos.*') ? 'active' : '',
                'icono' => 'fa-solid fa-book fa-lg',
                'icono_color' => '#27aa94'
            ],
            [
                'name' => 'Blog',
                'route' => route('blog.index'),
                'active' => request()->routeIs('blog.*') ? 'active' : '',
                'icono' => 'fa-solid fa-blog fa-lg',
                'icono_color' => '#0ac720'
            ],
            [
                'name' => 'Contáctanos',
                'route' => route('contactanos.index'),
                'active' => request()->routeIs('contactanos.*') ? 'active disabled' : '',
                'icono' => 'fa-solid fa-address-card fa-lg',
                'icono_color' => '#ff9500'
            ],
            [
                'name' => 'Nosotros',
                'route' => route('nosotros'),
                'active' => request()->routeIs('nosotros') ? 'active disabled' : '',
                'icono' => 'fa-solid fa-circle-info fa-lg',
                'icono_color' => '#ffde05'
            ],
    ];
    $this->links_users = [
        [
            'name' => 'Perfil',
            'route' => ! empty( auth()->user()->profile) ? route('profile.edit', auth()->user()->profile) : route('profile.create'),
            'active' => request()->routeIs('profile.*') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-id-badge',
            'icono_color' => '#b7c3d7'
        ],
        [
            'name' => 'Dashboard',
            'route' => route('dashboard'),
            'active' => request()->routeIs('dashboard') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-gauge-high',
            'icono_color' => '#218c55'
        ],
        [
            'name' => 'Cerrar Sesión',
            'route' => route('logout'),
            'active' => '',
            'icono' => 'fa-solid fa-arrow-right-from-bracket',
            'icono_color' => '#e27474'
        ],
    ];
    $this->links_auths = [
        [
            'name' => 'Acceso',
            'route' => route('login'),
            'active' => request()->routeIs('login') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-lock-open',
            'icono_color' => '#932a6c'
        ],
        [
            'name' => 'Registrarse',
            'route' => route('register.index'),
            'active' => request()->routeIs('register.*') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-right-to-bracket',
            'icono_color' => '#36c44d'
        ],
    ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
