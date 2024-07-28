<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Service\PlaceReviewsAPI\Facades\PlaceReviewsAPIFacades;

class Reviews extends Component
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
        $reviews = PlaceReviewsAPIFacades::getReviews();
        return view('components.reviews', ['reviews' => $reviews]);
    }
}
