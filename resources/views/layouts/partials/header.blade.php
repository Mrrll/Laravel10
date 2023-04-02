@php
    $links_pages = [
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
    $links_users = [
        [
            'name' => 'Perfil',
            'route' => ! empty( auth()->user()->profile) ? route('profile.edit', auth()->user()->profile) : route('profile.create'),
            'active' => request()->routeIs('profile.*') ? 'active disabled' : '',
            'icono' => 'fa-solid fa-id-badge',
            'icono_color' => '#b7c3d7'
        ],
        [
            'name' => 'Cerrar Sesión',
            'route' => route('logout'),
            'active' => '',
            'icono' => 'fa-solid fa-arrow-right-from-bracket',
            'icono_color' => '#e27474'
        ],
    ];
    $links_auths = [
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
@endphp
<header class="bg-light border-bottom">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <i class="fa-brands fa-laravel fa-2xl me-1" style="color: #ff0000;"></i>
            <a class="navbar-brand">Laravel 10</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex-lg justify-content-lg-between" id="navbarNav">
                <ul class="navbar-nav">
                    @foreach ($links_pages as $link_page)
                        <li class="nav-item">
                            <a class="nav-link {{ $link_page['active'] }}" aria-current="page"
                                href="{{ $link_page['route'] }}">
                                <i class="{{ $link_page['icono'] }}" style="color: {{$link_page['icono_color']}};"></i> {{ $link_page['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <hr class="hidden-lg">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-link d-none d-lg-block">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-display="static"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user fa-2xl" style="color: #8a0000;"></i>
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach ($links_users as $link_user)
                                    <li class="nav-item">
                                        <a href="{{ $link_user['route'] }}"
                                            class="nav-link dropdown-item {{ $link_user['active'] }}">
                                            <i class="{{ $link_user['icono'] }}" style="color: {{$link_user['icono_color']}};"></i>
                                            {{ $link_user['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <ul class="navbar-nav d-lg-none">
                            @foreach ($links_users as $link_user)
                                <li class="nav-item">
                                    <a class="nav-link {{ $link_user['active'] }}" aria-current="page"
                                        href="{{ $link_user['route'] }}">{{ $link_user['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        @foreach ($links_auths as $link_auth)
                            <li class="nav-item">
                                <a class="nav-link {{ $link_auth['active'] }}" aria-current="page"
                                    href="{{ $link_auth['route'] }}">
                                    <i class="{{ $link_auth['icono'] }}" style="color: {{$link_auth['icono_color']}};"></i>
                                    {{ $link_auth['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</header>
