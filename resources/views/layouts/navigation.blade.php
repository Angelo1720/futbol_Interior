 {{-- <nav class="navbar navbar-expand-lg navbar-light bg-warning-subtle border-b border-gray-100">
     <div class="container-fluid">
         <!-- Logo -->
         <a class="navbar-brand" href="{{ route('dashboard') }}">
             <img src="{{ asset('Images/futbol-InteriorV1.png') }}" class="h-20" alt="Logo">
         </a>

         <!-- Hamburger Button for Mobile -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <!-- Navigation Links -->
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Menú Principal') }}</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('usuarios') }}">{{ __('Usuarios') }}</a>
                 </li>
             </ul>

             <!-- User Dropdown -->
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         {{ Auth::user()->name }}
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Mi perfil') }}</a>
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <button type="submit" class="dropdown-item">{{ __('Cerrar Sesión') }}</button>
                         </form>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </nav> --}}
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
         <a class="navbar-brand" href="{{ route('dashboard') }}">Futbol Interior</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
             aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="#">Comunidad</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                         aria-expanded="false">
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
                         aria-expanded="false">
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
                         Departamento
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
                                 aria-expanded="false">
                                 Administrar
                             </a>
                             <ul class="dropdown-menu">
                                 <li><a class="dropdown-item" href="{{ route('usuarios') }}">Usuarios</a></li>
                                 <li><a class="dropdown-item" href="#">Equipos</a></li>
                                 <li><a class="dropdown-item" href="#">Campeonatos</a></li>
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
                         {{ Auth::user()->name }}
                     </a>
                     <ul class="dropdown-menu">
                         <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Mi perfil') }}</a>
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <button type="submit" class="dropdown-item">{{ __('Cerrar Sesión') }}</button>
                         </form>
                     </ul>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
