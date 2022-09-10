<?php

namespace Yousef\LaravelFacebookConversationApi;

use Yousef\LaravelFacebookConversationApi\Facades\ConversionsApi;
use Yousef\LaravelFacebookConversationApi\View\Components\DataLayerPageView;
use Yousef\LaravelFacebookConversationApi\View\Components\DataLayerUserDataVariable;
use Yousef\LaravelFacebookConversationApi\View\Components\DataLayerVariable;
use Yousef\LaravelFacebookConversationApi\View\Components\FacebookPixelPageView;
use Yousef\LaravelFacebookConversationApi\View\Components\FacebookPixelScript;
use Yousef\LaravelFacebookConversationApi\View\Components\FacebookPixelTrackingEvent;
use Yousef\LaravelFacebookConversationApi\View\Components\GoogleTagManagerBody;
use Yousef\LaravelFacebookConversationApi\View\Components\GoogleTagManagerHead;
use Illuminate\Support\ServiceProvider;

class ConversionsApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom($this->viewPath(), 'conversions-api');
        $this->loadViewComponentsAs('conversions-api', [
            'data-layer-page-view' => DataLayerPageView::class,
            'data-layer-variable' => DataLayerVariable::class,
            'data-layer-user-variable' => DataLayerUserDataVariable::class,
            'facebook-pixel-script' => FacebookPixelScript::class,
            'facebook-pixel-page-view' => FacebookPixelPageView::class,
            'facebook-pixel-tracking-event' => FacebookPixelTrackingEvent::class,
            'google-tag-manager-body' => GoogleTagManagerBody::class,
            'google-tag-manager-head' => GoogleTagManagerHead::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([$this->configPath() => config_path('conversions-api.php')], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom($this->configPath(), 'conversions-api');
        $this->app->singleton(ConversionsApi::class);
    }

    protected function configPath(): string
    {
        return __DIR__ . '/../config/conversions-api.php';
    }

    protected function viewPath(): string
    {
        return __DIR__ . '/../resources/views';
    }
}
