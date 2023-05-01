<?php

use ajyshrma69\ZohoConnector\ZohoClient;

$config = [
    'client_id' => '1000.LCWESW44DPIG7OQDECHH6Y1YFDCF9A',
    'client_secret' => '46866b4bcd2f096ec5cd195deb40b0ca063a04e191',
    'redirect_url' => 'http://localhost/zoho/callback.php',
    'access_token' => '1000.d79dbb70cd4885bc1943db40f9fd0a38.ec1b59252daa8d7b81644491b1596067'
];
include 'vendor/autoload.php';
$client = new ZohoClient($config);
if (isset($_GET['code'])) {
    $client->setZohoCode($_GET['code']);
    $response =   $client->generateAccessToken();
}

print_r($client->getAccessToken());
print_r($client->getRefreshToken());
