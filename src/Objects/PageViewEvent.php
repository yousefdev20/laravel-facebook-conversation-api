<?php

namespace Yousef\LaravelFacebookConversationApi\Objects;

use Yousef\LaravelFacebookConversationApi\Contracts\MapsToDataLayer;
use Yousef\LaravelFacebookConversationApi\Contracts\MapsToFacebookPixel;
use Yousef\LaravelFacebookConversationApi\Facades\ConversionsApi;
use FacebookAds\Object\ServerSide\ActionSource;
use FacebookAds\Object\ServerSide\Event;
use Illuminate\Support\Str;

class PageViewEvent extends Event implements MapsToFacebookPixel, MapsToDataLayer
{
    public static function create(): self
    {
        return (new self())
            ->setActionSource(ActionSource::WEBSITE)
            ->setEventName('PageView')
            ->setEventId((string) Str::uuid())
            ->setEventTime(time())
            ->setEventSourceUrl(request()->fullUrl())
            ->setUserData(ConversionsApi::getUserData());
    }

    public function getFacebookPixelEventType(): string
    {
        return 'track';
    }

    public function getFacebookPixelEventName(): string
    {
        return $this->getEventName();
    }

    public function getFacebookPixelCustomData(): array
    {
        return [];
    }

    public function getFacebookPixelEventData(): array
    {
        return ['eventID' => $this->getEventId()];
    }

    public function getDataLayerArguments(): array
    {
        return [
            'event' => 'conversionsApiPageView',
            'conversionsApiPageViewEventId' => $this->getEventId()
        ];
    }
}
