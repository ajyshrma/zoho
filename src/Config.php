<?php

namespace ajyshrma69\ZohoConnector;


class Config
{

    public $baseUrl = "https://accounts.zoho.com/oauth";
    public $apiVerson = "v2";
    public $client_id = "";
    public $client_secret = "";
    public $redirect_url = "";
    public $scopes = "ZohoSign.documents.CREATE,ZohoSign.documents.READ,ZohoSign.documents.UPDATE,ZohoSign.documents.DELETE";
    public $access_token = "";
    public $refresh_token = "";
    public $code = '';


    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            if (isset($this->{$key})) {
                $this->{$key} = $value;
            }
        }
    }

    public function getApiUrl()
    {
        return $this->baseUrl . "/" . $this->apiVerson . "/";
    }

    public function setZohoCode($code)
    {
        return $this->code = $code;
    }

    public function setAccessToken($token)
    {
        return $this->access_token = $token;
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function setRefreshToken($token)
    {
        return $this->refresh_token = $token;
    }

    public function getRefreshToken()
    {
        return $this->refresh_token;
    }
}
