<aside class="aside-dashboard bg-dark text-light d-none d-lg-block" id="aside_dashboard" style="width:80px;">
    <div class="container-fluid">
        {{-- Boton Cierre y Campo Busqueda  --}}
        <form id="content_aside_1" class="d-none">
            <div class="aside-first-grid mt-3">
                <input class="form-control me-2 inptsearch" type="search" placeholder="Search" aria-label="Search"
                    style="width: 165px">
                <button class="btn btn-outline-success btnsearch" type="submit">Search</button>
                <button type="button" class="btn-close btn-close-white btnclose ms-2" aria-label="Close"
                    id="btn_close_aside"></button>
            </div>
        </form>
        {{-- Boton menu --}}
        <nav class="navbar navbar-dark d-block" id="content-btn-nav">
            <button class="navbar-toggler" type="button" id="btn_open_aside">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <hr>
        {{-- Lista de links  --}}
        <ul class="navbar-nav list-group">
            <li class="nav-item">
                {{-- Boton del link --}}
                <div id="btn_link_dashboard" class="d-none">
                    @foreach ($links as $link)
                        @if (array_key_exists('can', $link))
                            @canany($link['can'])
                                <button class="btn btn-outline-secondary text-start mb-1" style="width: 100%;"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#{{ $link['name_collapse'] }}"
                                    aria-expanded="false" aria-controls="{{ $link['name_collapse'] }}"
                                    id="btn_link_dashboard">
                                    <i class="{{ $link['icono'] }}" style="color:{{ $link['icono_color'] }};"></i>
                                    <span>{{ $link['name'] }}</span>
                                </button>
                                {{-- Lista del colapsos --}}
                                <ul class="dropdown-menu collapse collapse-vertical bg-dark"
                                    id="{{ $link['name_collapse'] }}">
                                    @foreach ($link['items'] as $item)
                                        <li>
                                            @if (!empty($item['data-bs-toggle']))
                                                <a data-bs-toggle="{{ $item['data-bs-toggle'] }}"
                                                    data-bs-target="{{ $item['data-bs-target'] }}"
                                                    class="dropdown-item text-white" type="button">
                                                    <i class="{{ $item['icono'] }}"
                                                        style="color:{{ $item['icono_color'] }};"></i>
                                                    {{ $item['name'] }}
                                                </a>
                                            @else
                                                <a href="{{ $item['route'] }}" class="dropdown-item text-white"
                                                    type="button">
                                                    <i class="{{ $item['icono'] }}"
                                                        style="color:{{ $item['icono_color'] }};"></i>
                                                    {{ $item['name'] }}
                                                </a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endcanany
                        @else
                            <button class="btn btn-outline-secondary text-start mb-1" style="width: 100%;"
                                type="button" data-bs-toggle="collapse" data-bs-target="#{{ $link['name_collapse'] }}"
                                aria-expanded="false" aria-controls="{{ $link['name_collapse'] }}"
                                id="btn_link_dashboard">
                                <i class="{{ $link['icono'] }}" style="color:{{ $link['icono_color'] }};"></i>
                                <span>{{ $link['name'] }}</span>
                            </button>
                            {{-- Lista del colapsos --}}
                            <ul class="dropdown-menu collapse collapse-vertical bg-dark"
                                id="{{ $link['name_collapse'] }}">
                                @foreach ($link['items'] as $item)
                                    <li>
                                        @if (!empty($item['data-bs-toggle']))
                                            <a data-bs-toggle="{{ $item['data-bs-toggle'] }}" data-bs-target="{{ $item['data-bs-target'] }}" class="dropdown-item text-white" type="button">
                                                <i class="{{ $item['icono'] }}"
                                                    style="color:{{ $item['icono_color'] }};"></i>
                                                {{ $item['name'] }}
                                            </a>
                                        @else
                                            <a href="{{ $item['route'] }}" class="dropdown-item text-white" type="button">
                                                <i class="{{ $item['icono'] }}"
                                                    style="color:{{ $item['icono_color'] }};"></i>
                                                {{ $item['name'] }}
                                            </a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </div>
                {{-- Botones de los links en Iconos --}}
                <div class="btn-group dropend d-block" id="btn_links_iconos_dashboard">
                    @foreach ($links as $link)
                        @if (array_key_exists('can', $link))
                            @canany($link['can'])
                                <button type="button" class="btn btn-circle dropdown-toggle mb-1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="{{ $link['icono'] }}" style="color:{{ $link['icono_color'] }};"></i>
                                </button>
                                <ul class="dropdown-menu bg-dark">
                                    @foreach ($link['items'] as $item)
                                        <li>
                                            @if (!empty($item['data-bs-toggle']))
                                                <a data-bs-toggle="{{ $item['data-bs-toggle'] }}"
                                                    data-bs-target="{{ $item['data-bs-target'] }}"
                                                    class="dropdown-item text-white" type="button">
                                                    <i class="{{ $item['icono'] }}"
                                                        style="color:{{ $item['icono_color'] }};"></i>
                                                    {{ $item['name'] }}
                                                </a>
                                            @else
                                                <a href="{{ $item['route'] }}" class="dropdown-item text-white"
                                                    type="button">
                                                    <i class="{{ $item['icono'] }}"
                                                        style="color:{{ $item['icono_color'] }};"></i>
                                                    {{ $item['name'] }}
                                                </a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endcanany
                        @else
                            <button type="button" class="btn btn-circle dropdown-toggle mb-1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="{{ $link['icono'] }}" style="color:{{ $link['icono_color'] }};"></i>
                            </button>
                            <ul class="dropdown-menu bg-dark">
                                @foreach ($link['items'] as $item)
                                    <li>
                                        @if (!empty($item['data-bs-toggle']))
                                                <a data-bs-toggle="{{ $item['data-bs-toggle'] }}"
                                                    data-bs-target="{{ $item['data-bs-target'] }}"
                                                    class="dropdown-item text-white" type="button">
                                                    <i class="{{ $item['icono'] }}"
                                                        style="color:{{ $item['icono_color'] }};"></i>
                                                    {{ $item['name'] }}
                                                </a>
                                            @else
                                                <a href="{{ $item['route'] }}" class="dropdown-item text-white"
                                                    type="button">
                                                    <i class="{{ $item['icono'] }}"
                                                        style="color:{{ $item['icono_color'] }};"></i>
                                                    {{ $item['name'] }}
                                                </a>
                                            @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
</aside>
