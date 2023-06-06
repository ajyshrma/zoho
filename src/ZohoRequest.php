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


    /**
     * Sends Get Request to zoho server
     * @param string $url
     * 
     * @return $zohoResponse
     */
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

    /**
     * Sends Post Request to zoho server
     * @param string $url
     * @param array $data
     * 
     * @return $zohoResponse
     */
    public function sentPostRequest(string $url, array $data)
    {
        try {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            $headers = $this->getRequestHeaders();

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            curl_close($ch);
        } catch (ZohoException $e) {
            throw new ZohoException($e->getMessage());
        }
    }

    protected function getRequestHeaders()
    {
        $headers = array();
        $headers[] = "Authorization: Zoho-oauthtoken " . $this->zohoClient->access_token;

        return $headers;
    }
}
