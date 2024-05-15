<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Service\InstagramAPI\Facades\InstagramAPIFacades;

class InstagramPhotos extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $photos = InstagramAPIFacades::getInstagramPhotos();
        return view('components.instagram-photos', ['photos' => $photos]);
    }
}
