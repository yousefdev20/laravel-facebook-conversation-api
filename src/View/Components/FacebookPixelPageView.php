<?php

namespace Yousef\LaravelFacebookConversationApi\View\Components;

use Yousef\LaravelFacebookConversationApi\Facades\ConversionsApi;
use Yousef\LaravelFacebookConversationApi\Objects\PageViewEvent;

class FacebookPixelPageView extends FacebookPixelTrackingEvent
{
    public function __construct()
    {
        $pageViewEvent = PageViewEvent::create();
        ConversionsApi::clearEvents()->addEvent($pageViewEvent)->sendEvents();

        parent::__construct($pageViewEvent);
    }
}
