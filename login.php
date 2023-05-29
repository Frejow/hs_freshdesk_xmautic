<?php

include __DIR__ . '/vendor/autoload.php'; 

use Mautic\Auth\ApiAuth;

// $initAuth->newAuth() will accept an array of OAuth settings
$settings = array(
    'baseUrl'      => 'https://mtc.homecriptone.com',
    'version'      => 'OAuth2',
    'clientKey'    => '1_mmk6x5nwzg0sgww0wkko0g0gocwkk4skgg40o4wowwg4gkcwo',
    'clientSecret' => '2izz2l8m5ko44484kwwkgwgw44co40kckoc4sck00ws0gkkswk', 
    'callback'     => 'https://webhook.homescriptone.com/login.php'
);

// Initiate the auth object
$initAuth = new ApiAuth();
$auth     = $initAuth->newAuth($settings);

// Initiate process for obtaining an access token; this will redirect the user to the authorize endpoint and/or set the tokens when the user is redirected back after granting authorization

if ($auth->validateAccessToken()) {
    if ($auth->accessTokenUpdated()) {
        $accessTokenData = $auth->getAccessTokenData();

        //store access token data however you want
    }
}
