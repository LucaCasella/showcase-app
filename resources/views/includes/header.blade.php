<nav class="navbar navbar-expand-lg mb-lg-5 mt-lg-5">
    <div class="container-fluid d-lg-flex justify-content-between align-items-center">

        <img class="logo" src="{{asset('assets/logo.jpg')}}" alt="logo">

        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @lang('home.lang')
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="locale/it">Italiano</a></li>
                <li><a class="dropdown-item" href="locale/en">English</a></li>
                <li><a class="dropdown-item" href="locale/ru">Russian</a></li>
            </ul>
        </div>

        <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse sta" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Servizi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/matrimoni')}}">Matrimoni</a></li>
                            <li><a class="dropdown-item" href="{{url('/sessioni')}}">Sessioni Individuali</a></li>
                            <li><a class="dropdown-item" href="{{url('/reportage')}}">Reportage</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/contacts')}}">Contatti</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</nav>
