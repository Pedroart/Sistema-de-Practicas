<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a class="dropdown-item" href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                Cerrar la sesión
            <a>
        </form>
        <div class="dropdown-divider"></div>
        <a href="{{route('perfil.index')}}" class="dropdown-item">
            Perfil
        </a>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
    </a>
</li>
