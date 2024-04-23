<nav class="navbar navbar-expand-lg navbar-light bg-warning-subtle border-b border-gray-100">
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
</nav>
