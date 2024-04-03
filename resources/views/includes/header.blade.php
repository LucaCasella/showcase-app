<nav class="navbar navbar-expand-lg mb-3 mt-3">
    <div class="container-fluid navbar-container">
        <div class="navbar-logo">
            <a href="{{url('/')}}">
                <img class="logo" src="{{asset('assets/logo.jpg')}}" alt="logo">
            </a>
        </div>
        <div class="navbar-toggle">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse toggle-content" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/')}}">@lang('home.home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/photos')}}">@lang('home.photos')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/videos')}}">@lang('home.videos')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#contacts">@lang('home.contacts')</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-languages">
            <x-language-selector/>
        </div>
    </div>
</nav>
