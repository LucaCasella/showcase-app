<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LinkWhatsappIcon extends Component
{

    public const LINK_CHAT = 'https://api.whatsapp.com/send?phone=';

    public const CHAT_NUMBER = '3803797287';

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.link-whatsapp-icon', [
            'linkChat' => self::LINK_CHAT,
            'chatNumber' => self::CHAT_NUMBER,
        ]);
    }
}
