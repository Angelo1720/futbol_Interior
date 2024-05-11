<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Futbol Interior</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#"> <img src="/Images/burbuja-de-dialogo.png"
                            alt="Icono"> Comunidad</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"> <img src="/Images/copa-de-futbol.png" alt="Icono">
                        Campeonatos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Divisional "A"</a></li>
                        <li><a class="dropdown-item" href="#">Divisional "B"</a></li>
                        <li><a class="dropdown-item" href="#">Divisional "C"</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"> <img src="/Images/club-de-futbol.png" alt="Icono">
                        Clubes
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Títulos</a></li>
                        <li><a class="dropdown-item" href="#">Clubes en la historia</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="/Images/uruguay.png" alt="Icono"> Departamento
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Jugadores Históricos</a></li>
                        <li><a class="dropdown-item" href="#">Palmarés</a></li>
                        <li><a class="dropdown-item" href="#">Campeonatos Interinos</a></li>
                    </ul>
                </li>
                @auth
                    @role('admin_Liga')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"> <img src="/Images/administracion.png" alt="Icono">
                                Administrar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('usuarios') }}">Usuarios</a></li>
                                <li><a class="dropdown-item" href="{{ route('equipos') }}">Equipos</a></li>
                                <li><a class="dropdown-item" href="{{ route('campeonatos') }}">Campeonatos</a></li>
                                <li><a class="dropdown-item" href="#">Documentos</a></li>
                                <li><a class="dropdown-item" href="#">Jugadores Históricos</a></li>
                                <li><a class="dropdown-item" href="#">Institución</a></li>
                            </ul>
                        </li>
                    @endrole
                    @role('admin_Equipo')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Administrar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Equipo</a></li>
                                <li><a class="dropdown-item" href="#">Convocados</a></li>
                            </ul>
                        </li>
                    @endrole
                @endauth
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-person-circle m-2 {{ Auth::user()->hasRole('admin_Liga') ? 'text-danger' : (Auth::user()->hasRole('admin_Equipo') ? 'text-warning' : 'text-info') }}"
                            viewBox="0 0 16 16">

                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}"> <img
                                src="/Images/red-social.png" alt="Icono"> {{ __('Mi perfil') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item"> <img src="/Images/apagar.png"
                                    alt="Icono"> {{ __('Cerrar Sesión') }}</button>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
