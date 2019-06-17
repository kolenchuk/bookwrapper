<?php
/**
 */

namespace BookApiWrapper\Api;


class ResponseParser
{
    protected $body = '';

    public function __construct($responseBody)
    {
        $this->body = $responseBody;
        return $this;
    }

    public function parse()
    {
        $response = new Response();
        $bodyObject = json_decode($this->body);
        foreach (get_object_vars($bodyObject) as $property => $val) {
            if (!property_exists($response, $property)) {
                continue;
            }

            $response->$property = $val;
        }
        return $response;
    }
}