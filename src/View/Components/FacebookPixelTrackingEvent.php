<?php

namespace Yousef\LaravelFacebookConversationApi\View\Components;

use Yousef\LaravelFacebookConversationApi\Contracts\MapsToFacebookPixel;
use Illuminate\View\Component;

class FacebookPixelTrackingEvent extends Component
{
    protected $event;
    public function __construct($event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('conversions-api::components.facebook-pixel-tracking-event', [
            'eventType' => $this->event->getFacebookPixelEventType(),
            'eventName' => $this->event->getFacebookPixelEventName(),
            'customData' => $this->event->getFacebookPixelCustomData(),
            'eventData' => $this->event->getFacebookPixelEventData(),
        ]);
    }
}
