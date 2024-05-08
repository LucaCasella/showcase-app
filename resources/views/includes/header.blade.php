<nav class="navbar navbar-expand-lg mb-lg-5 mt-lg-5">
    <div class="container-fluid d-lg-flex justify-content-between align-items-center">
        <img class="logo" src="{{asset('assets/logo.jpg')}}" alt="logo">
        <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse sta" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">@lang('home.home')</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            @lang('home.services')
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('/matrimoni')}}">@lang('home.weddings')</a></li>
                            <li><a class="dropdown-item" href="{{url('/sessioni')}}">@lang('home.sessions')</a></li>
                            <li><a class="dropdown-item" href="{{url('/reportage')}}">@lang('home.reportage')</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacts">@lang('home.contacts')</a>
                    </li>
                </ul>
            </div>

        </div>
        <x-language-selector />
    </div>
</nav>
