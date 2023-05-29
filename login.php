<?php

include __DIR__ . '/vendor/autoload.php'; 

use \Mautic\Auth\ApiAuth;

session_start();

// @todo check if the request is sent from user with admin rights
// @todo check if Base URL, Consumer/Client Key and Consumer/Client secret are not empty

// @todo load this array from database or config file
$accessTokenData = array(
    'accessToken' => '5zg9g4t2jio8gcs80w84ogokw848g80sk4cgg4csk4w44s0wkc',
    'accessTokenSecret' => '29svoevb0tnokww8ssoscgcsw0c04go8k0s48s4skg8kgkwkss',
    'accessTokenExpires' => '3600'
);

// @todo Sanitize this URL. Make sure it starts with http/https and doesn't end with '/'
$mauticBaseUrl = $_POST['mauticBaseUrl'];

$settings = array(
    'baseUrl'           => $mauticBaseUrl,
    'clientKey'         => $_POST['clientKey'],
    'clientSecret'      => $_POST['clientSecret'],
    'callback'          => 'https://webhook.homescriptone.com/auth.php', // @todo Change this to your app callback. It should be the same as you entered when you were creating your Mautic API credentials.
    'version'           => 'OAuth1a'
);

if (!empty($accessTokenData['accessToken']) && !empty($accessTokenData['accessTokenSecret'])) {
    $settings['accessToken']        = $accessTokenData['accessToken'] ;
    $settings['accessTokenSecret']  = $accessTokenData['accessTokenSecret'];
    $settings['accessTokenExpires'] = $accessTokenData['accessTokenExpires'];
}

$auth = ApiAuth::initiate($settings);

if ($auth->validateAccessToken()) {
    if ($auth->accessTokenUpdated()) {
        $accessTokenData = $auth->getAccessTokenData();
        // @todo Save $accessTokenData
        // @todo Display success authorization message
    } else {
        // @todo Display info message that this app is already authorized.
    }
} else {
    // @todo Display info message that the token is not valid.
}