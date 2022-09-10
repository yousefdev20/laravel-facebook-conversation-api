<?php

namespace Yousef\LaravelFacebookConversationApi\View\Components;

use Yousef\LaravelFacebookConversationApi\Facades\ConversionsApi;
use Yousef\LaravelFacebookConversationApi\Objects\PageViewEvent;

class DataLayerPageView extends DataLayerVariable
{
    public function __construct()
    {
        $pageViewEvent = PageViewEvent::create();
        ConversionsApi::clearEvents()->addEvent($pageViewEvent)->sendEvents();

        parent::__construct($pageViewEvent);
    }
}
