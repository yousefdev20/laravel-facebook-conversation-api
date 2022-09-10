<?php

namespace Yousef\LaravelFacebookConversationApi\View\Components;

use Yousef\LaravelFacebookConversationApi\Contracts\MapsToDataLayer;
use Yousef\LaravelFacebookConversationApi\Facades\ConversionsApi;

class DataLayerUserDataVariable extends DataLayerVariable implements MapsToDataLayer
{
    public function __construct()
    {
        parent::__construct($this);
    }

    public function getDataLayerArguments(): array
    {
        $userData = ConversionsApi::getUserData();

        return array_filter([
            'conversionsApiUserEmail' => $userData->getEmail(),
            'conversionsApiUserFirstName' => $userData->getFirstName(),
            'conversionsApiUserLastName' => $userData->getLastName(),
            'conversionsApiUserPhone' => $userData->getPhone(),
            'conversionsApiUserExternalId' => $userData->getExternalId(),
            'conversionsApiUserGender' => $userData->getGender(),
            'conversionsApiUserDateOfBirth' => $userData->getDateOfBirth(),
            'conversionsApiUserCity' => $userData->getCity(),
            'conversionsApiUserState' => $userData->getState(),
            'conversionsApiUserZipCode' => $userData->getZipCode(),
            'conversionsApiUserCountry' => $userData->getCountryCode(),
        ]);
    }
}