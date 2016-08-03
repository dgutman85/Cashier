<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Cashier
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @if(Auth::check())
                <ul class="nav navbar-nav">
                    @if(Auth::user()->role === 'admin')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Configuración <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                                <li><a href="{{ route('moneys.index') }}">Valores</a></li>
                                <li><a href="{{ route('boxes.index') }}">Cajas</a></li>
                            </ul>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('boxes.show', Auth::user()->box_id) }}">Caja</a>
                    </li>
                    <li>
                        <a href="{{ route('incoming', Auth::user()->box_id) }}">Entrada</a>
                    </li>
                    <li>
                        <a href="{{ route('outgoing', Auth::user()->box_id) }}">Salida</a>
                    </li>
                </ul>
            @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Acceder</a></li>
                    <li><a href="{{ url('/register') }}">Registrarse</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesión</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>