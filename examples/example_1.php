<?php

use Ajyshrma\Zoho\ZohoClient;

$client = new ZohoClient([
    'client_id' => '1000.LCWESW44DPIG7OQDECHH6Y1YFDCF9A',
    'client_secret' => '46866b4bcd2f096ec5cd195deb40b0ca063a04e191'
]);



echo "<pre>";
print_r($client);
