<?php

// https://developer.moneybird.com/authentication/
return [
    'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
    'client_id' => env('MB_CLIENT_ID'),
    'client_secret' => env('MB_CLIENT_SECRET'),
    'authorization_token' => '',
    'access_token' => env('MB_ACCESS_TOKEN'),
    'administration_id' => env('MB_ADMINISTRATION_ID')
];