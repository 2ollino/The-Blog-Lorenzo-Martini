<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="nav-link fw-bold fs-4 " href="/">TLSJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @guest

                    <li>
                        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                    
                    
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Ciao, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('article.create') }}">Crea Articolo</a>
                            </li>
                            @if (Auth::user()->is_admin)
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                            </li>
                            @endif
                            
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @if (Auth::user()->is_revisor)
                            <li>
                                <a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard Revisore</a>
                            </li>
                            @endif
                            <li>

                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" style="color: red">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>

                @endguest
                <li>
                    <a class="nav-link" href="{{ route('article.index') }}">Tutti gli articoli</a>
                </li>
                <li>
                        <a class="nav-link" href="{{ route('careers') }}">Lavora con noi</a>
                    </li>
                <li>
                    <label class="switch">
                        <input checked="true" id="checkbox" type="checkbox" />
                        <span class="slider">
                            <div class="star star_1"></div>
                            <div class="star star_2"></div>
                            <div class="star star_3"></div>
                            <svg viewBox="0 0 16 16" class="cloud_1 cloud">
                                <path transform="matrix(.77976 0 0 .78395-299.99-418.63)" fill="#fff"
                                    d="m391.84 540.91c-.421-.329-.949-.524-1.523-.524-1.351 0-2.451 1.084-2.485 2.435-1.395.526-2.388 1.88-2.388 3.466 0 1.874 1.385 3.423 3.182 3.667v.034h12.73v-.006c1.775-.104 3.182-1.584 3.182-3.395 0-1.747-1.309-3.186-2.994-3.379.007-.106.011-.214.011-.322 0-2.707-2.271-4.901-5.072-4.901-2.073 0-3.856 1.202-4.643 2.925">
                                </path>
                            </svg>
                        </span>
                    </label>
                </li>
            </ul>
            <form action="{{ route('article.search') }}" method="GET" class="d-flex" role="search">
                <input class="form-control me-2" name="query" type="search" placeholder="Cerca" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cerca</button>
            </form>
        </div>
    </div>
</nav>
