<?php

namespace Ibonly\Agriteer;

use GuzzleHttp\Client;

class Main
{
    protected $baseUrl = "http://newagriteer.app/api/v1";
    protected $token;

    /**
     * Set instance for response of guzzlehttp\client
     */
    protected $response;

    /**
     * Set instance of guzzlehttp\client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => $this->baseUrl]);
        $this->token = "?token=";
    }

    /**
     * Set the response url for guzzle client
     * 
     * @param $url
     * @return void
     */
    public function setResponse($method, $url, $body)
    {
        $this->response = $this->client->{strtolower($method)}($this->baseUrl.$url, ["form_params" => $body]);
    }

    public function withToken($url, $token)
    {
        return $url.''.$this->token.''.$token;
    }

    /**
     * Setup response data
     * 
     * @param  $url Query string
     * @return object
     */
    public function api($method, $url, $token = null)
    {
    	$url = ($token == null) ? $url : $this->withToken($url, $token);

        $this->setResponse($method, $url);

        return $this->data();
    }

    /**
     * Setup response data
     * 
     * @param  $url Query string
     * @return object
     */
    public function postAPI($method, $url, $body, $token = null)
    {
    	$url = ($token == null) ? $url : $this->withToken($url, $token);

        $this->setResponse($method, $url, $body);

        return $this->data();
    }

    /**
     *  Get the details of the required request
     *  
     * @return object
     */
    private function data()
    {
        return json_decode($this->response->getBody());
    }
}