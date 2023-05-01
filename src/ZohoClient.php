<?php

namespace ajyshrma69\ZohoConnector;

use Exception;

class ZohoClient extends Config
{

    public function __construct(array $data)
    {
        parent::__construct($data);
    }

    /**
     * Creates Api Header
     */
    public function getHeaders()
    {
        $headers = [];
        array_push($headers, 'Authorization:Zoho-oauthtoken ' . $this->getAccessToken());
        return $headers;
    }

    /**
     * Generate Path To Create Zoho Code
     */
    public function zohoCodeGenerateUrl()
    {
        $url = $this->getApiUrl() . "auth?scope=$this->scopes&client_id=$this->client_id&state=testing&response_type=code&redirect_uri=$this->redirect_url&access_type=offline&prompt=consent";

        return "<a href='$url' target='_blank'>Click To Get Code </a>";
    }

    /**
     *  GENERATE ACCESS AND REFRESH TOKEN
     * 
     * @return AccessToken $this
     */
    public function generateAccessToken()
    {
        try {
            $url = $this->getApiUrl() . "token?code=$this->code&client_id=" . $this->client_id . "&client_secret=" . $this->client_secret . "&redirect_uri=" . $this->redirect_url . "&grant_type=authorization_code";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
            ));
            $response   = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);

            return $response;
            if (!property_exists($response, 'error')) {
                if (property_exists($response, 'access_token')) {
                    $this->setAccessToken($response->access_token);
                }
                if (property_exists($response, 'refresh_token')) {
                    $this->setRefreshToken($response->refresh_token);
                }
                return $this;
            }
        } catch (Exception $e) {
            throw new Exception('Invalid Code Provide . Please refresh token');
        }
    }
}
