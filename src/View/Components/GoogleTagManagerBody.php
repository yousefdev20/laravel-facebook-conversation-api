<?php

namespace Yousef\LaravelFacebookConversationApi\View\Components;

use Illuminate\View\Component;

class GoogleTagManagerBody extends Component
{
    protected $gtmId;

    public function __construct($gtmId = null)
    {
        $this->gtmId = $gtmId ?? config('conversions-api.gtm_id');
    }

    public function render()
    {
        return view('conversions-api::components.google-tag-manager-body', [
            'gtmId' => $this->gtmId,
        ]);
    }
}