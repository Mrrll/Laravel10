@php
    $links_pages = [
        [
            'name' => 'Home',
            'route' => route('home'),
            'active' => request()->routeIs('home') ? 'active disabled' : '',
        ],
        [
            'name' => 'Cursos',
            'route' => route('cursos.index'),
            'active' => request()->routeIs('cursos.*') ? 'active' : '',
        ],
        [
            'name' => 'Nosotros',
            'route' => route('nosotros'),
            'active' => request()->routeIs('nosotros') ? 'active disabled' : '',
        ],
        [
            'name' => 'Contáctanos',
            'route' => route('contactanos.index'),
            'active' => request()->routeIs('contactanos.*') ? 'active disabled' : '',
        ],
    ];
    $links_users = [
        [
            'name' => 'Perfil',
            'route' => ! empty( auth()->user()->profile) ? route('profile.edit') : route('profile.create'),
            'active' => request()->routeIs('profile.*') ? 'active disabled' : '',
        ],
        [
            'name' => 'Cerrar Sesion',
            'route' => route('logout'),
            'active' => '',
        ],
    ];
    $links_auths = [
        [
            'name' => 'Acceso',
            'route' => route('login'),
            'active' => request()->routeIs('login') ? 'active disabled' : '',
        ],
        [
            'name' => 'Registrarse',
            'route' => route('register.index'),
            'active' => request()->routeIs('register.*') ? 'active disabled' : '',
        ],
    ];
@endphp
<header class="bg-light border-bottom">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
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
                                href="{{ $link_page['route'] }}">{{ $link_page['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <hr class="hidden-lg">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-link d-none d-lg-block">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-display="static"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @foreach ($links_users as $link_user)
                                    <li class="nav-item">
                                        <a href="{{ $link_user['route'] }}"
                                            class="nav-link dropdown-item {{ $link_user['active'] }}">{{ $link_user['name'] }}</a>
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
                                    href="{{ $link_auth['route'] }}">{{ $link_auth['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
</header>
