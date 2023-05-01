<?php

namespace ajyshrma69\ZohoConnector;

use Exception;

class Config
{

    public $baseUrl = "https://accounts.zoho.com/oauth";
    public $apiVersion = "v2";
    public $client_id = "";
    public $client_secret = "";
    public $redirect_url = "";
    public $scopes = "ZohoSign.documents.CREATE,ZohoSign.documents.READ,ZohoSign.documents.UPDATE,ZohoSign.documents.DELETE";
    public $access_token = "";
    public $refresh_token = "";
    public $code = '';


    public function __construct(array $data)
    {
        if (!isset($data['client_id']) || empty($data['client_id'])) {
            throw new ZohoException(ZohoException::ZOHO_CLIENT_ID_NOT_FOUND, 404);
        }

        foreach ($data as $key => $value) {
            if (isset($this->{$key})) {
                $this->{$key} = $value;
            }
        }
    }

    public function getApiUrl()
    {
        return $this->baseUrl . "/" . $this->getApiVersion() . "/";
    }

    public function setApiVersion($version = 'v2')
    {
        return $this->apiVersion = $version;
    }

    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    public function setZohoCode($code)
    {
        return $this->code = $code;
    }

    public function getZohoCode()
    {
        return $this->code;
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

    public function setScopes(string $scopes)
    {
        return $this->scopes = $scopes;
    }

    public function getScopes()
    {
        return $this->scopes;
    }
}
