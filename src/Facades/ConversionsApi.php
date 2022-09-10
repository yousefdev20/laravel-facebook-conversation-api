<?php

namespace Yousef\LaravelFacebookConversationApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static self setUserData(\FacebookAds\Object\ServerSide\UserData $userData)
 * @method static \FacebookAds\Object\ServerSide\UserData getUserData()
 * @method static self addEvent(\FacebookAds\Object\ServerSide\Event $event)
 * @method static self addEvents(iterable $events)
 * @method static self setEvents(iterable $events)
 * @method static \Illuminate\Support\Collection getEvents()
 * @method static self clearEvents()
 * @method static \GuzzleHttp\Promise\PromiseInterface sendEvents()
 *
 * @see \Yousef\LaravelFacebookConversationApi\ConversionsApi
 */
class ConversionsApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Yousef\LaravelFacebookConversationApi\ConversionsApi::class;
    }
}
