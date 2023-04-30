<header class="bg-light border-bottom header-dashboard">
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

                                @if (!empty(auth()->user()->image->url))
                                    <img src="{{asset(auth()->user()->image->url)}}" width="40px" height="40px">
                                @else
                                    <i class="fa-solid fa-circle-user fa-2xl" style="color: #8a0000;"></i>
                                @endif
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
                                        href="{{ $link_user['route'] }}">
                                        <i class="{{ $link_user['icono'] }}" style="color: {{$link_user['icono_color']}};"></i>
                                        {{ $link_user['name'] }}
                                    </a>
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
