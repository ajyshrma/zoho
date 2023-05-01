<?php

namespace ZohoConnector;

class Config
{

    public $baseUrl = "https://accounts.zoho.com/oauth/";
    public $apiVerson = "V2";
    public $client_id = "1000.LCWESW44DPIG7OQDECHH6Y1YFDCF9A";
    public $client_secret = "46866b4bcd2f096ec5cd195deb40b0ca063a04e191";
    public $redirect_url = "http://localhost/zoho/callback.php";
    public $scopes = "ZohoSign.documents.CREATE,ZohoSign.documents.READ,ZohoSign.documents.UPDATE,ZohoSign.documents.DELETE";
    public $access_token = "1000.d79dbb70cd4885bc1943db40f9fd0a38.ec1b59252daa8d7b81644491b1596067";
    public $refresh_token = "1000.221f9eee9fc1c11fef3618373a8b1819.a64ddea72b08dc4ccec6a3cd11820520";
    public $code = '';


    public function __construct()
    {
    }

    public function getApiUrl()
    {
        return $this->baseUrl . DIRECTORY_SEPARATOR . $this->apiVerson . DIRECTORY_SEPARATOR;
    }
}
