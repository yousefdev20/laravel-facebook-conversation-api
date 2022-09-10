<?php

namespace Yousef\LaravelFacebookConversationApi\Contracts;

interface MapsToFacebookPixel
{
    public function getFacebookPixelEventType(): string;

    public function getFacebookPixelEventName(): string;

    public function getFacebookPixelCustomData(): array;

    public function getFacebookPixelEventData(): array;
}
