<nav class="navbar navbar-expand-lg mb-lg-5 mt-lg-5">
    <div class="container-fluid d-flex justify-content-between">
        <img class="logo" src="{{asset('assets/logo.jpg')}}" alt="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                    <a class="nav-link" href="#">Contatti</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
