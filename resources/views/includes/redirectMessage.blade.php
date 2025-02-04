@if ($message = \Illuminate\Support\Facades\Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0">{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif ($message = \Illuminate\Support\Facades\Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <p class="mb-0">{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
