<header>
    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('index') }}">CIRE Backbone</a>
        <!-- Menu -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-target">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navegação -->
        <div class="collapse navbar-collapse" id="nav-target">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">{{Auth::user()->nome}}</a>
                </li>
                <li class="nav-item">
                    <a href='javascript:logout.submit()' class="nav-link">Sair</a>
                    <form name='logout' method="post" action='{{ route('logout') }}'>
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>