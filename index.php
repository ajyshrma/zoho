<?php
include 'vendor/autoload.php';

use ajyshrma69\ZohoConnector\ZohoClient;

$config = [
    'client_secret' => '46866b4bcd2f096ec5cd195deb40b0ca063a04e191',
    'redirect_url' => 'http://localhost/zoho/callback.php'
];

$client = new ZohoClient($config);


echo $client->zohoCodeGenerateUrl();
