<?php

namespace Yousef\LaravelFacebookConversationApi\View\Components;

use Yousef\LaravelFacebookConversationApi\Contracts\MapsToDataLayer;
use Illuminate\View\Component;

class DataLayerVariable extends Component
{
    protected $event;
    public function __construct($event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('conversions-api::components.data-layer-variable', [
            'arguments' => $this->event->getDataLayerArguments(),
        ]);
    }
}
