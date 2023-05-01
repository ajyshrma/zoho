<?php
include 'vendor/autoload.php';

use ajyshrma69\ZohoConnector\ZohoClient;

$config = [
    'client_id' => 'Your Client ID',
    'client_secret' => 'Your Cliend Secret',
    'redirect_url' => 'http://localhost/zoho/callback.php'
];

$client = new ZohoClient($config);

echo $client->zohoCodeGenerateUrl();
