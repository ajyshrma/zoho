<?php

namespace ajyshrma69\ZohoConnector;

use ajyshrma69\ZohoConnector\ZohoClient;
use Exception;

class ZohoRequest
{

    public $zohoClient;

    public function __construct(ZohoClient $zohoClient)
    {
        $this->zohoClient = $zohoClient;
    }

    public function sendGetRequest($url)
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            $headers = $this->getRequestHeaders();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
            curl_close($ch);

            return $result;
        } catch (ZohoException $e) {
            throw new ZohoException($e->getMessage());
        }
    }


    public function getRequestHeaders()
    {
        $headers = array();
        $headers[] = "Authorization: Zoho-oauthtoken " . $this->zohoClient->access_token;

        return $headers;
    }
}
