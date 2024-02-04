<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkMatrimonioSite extends Component
{
    public const LINK_SITE = 'https://www.matrimonio.com/fotografo-matrimonio/anastasia-kabakova--e308307';

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
     * @return View|\Closure|string
     */
    public function render(): View|string|\Closure

    {
        return view('components.link-matrimonio-site', [
            'linkSite' => self::LINK_SITE,
        ]);
    }
}
