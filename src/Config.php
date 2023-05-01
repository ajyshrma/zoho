<?php

namespace ZohoConnector;

class Config
{

    public $baseUrl = "https://accounts.zoho.com/oauth/";
    public $apiVerson = "V2";
    public $client_id = "";
    public $client_secret = "";
    public $redirect_url = "http://localhost/zoho/callback.php";
    public $scopes = "ZohoSign.documents.CREATE,ZohoSign.documents.READ,ZohoSign.documents.UPDATE,ZohoSign.documents.DELETE";
    public $access_token = "";
    public $refresh_token = "";
    public $code = '';


    public function __construct()
    {
    }

    public function getApiUrl()
    {
        return $this->baseUrl . DIRECTORY_SEPARATOR . $this->apiVerson . DIRECTORY_SEPARATOR;
    }
}
