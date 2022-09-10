<?php

namespace Yousef\LaravelFacebookConversationApi\Collections;

use Yousef\LaravelFacebookConversationApi\Contracts\MapsToDataLayer;
use Yousef\LaravelFacebookConversationApi\Contracts\MapsToFacebookPixel;
use Illuminate\Support\Collection;

class EventCollection extends Collection
{
    public function filterFacebookPixelEvents()
    {
        return $this->filter(function ($event){ $event instanceof MapsToFacebookPixel; });
    }

    public function filterDataLayerEvents()
    {
        return $this->filter(function ($event) { $event instanceof MapsToDataLayer; });
    }
}
