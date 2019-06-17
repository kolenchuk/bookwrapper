<?php
/**
 */

namespace BookApiWrapper;

use BookApiWrapper\Api\ApiClientInterface;
use BookApiWrapper\Api\CurlRequest;
use BookApiWrapper\Api\EndpointBuilder;
use BookApiWrapper\Api\Response;
use BookApiWrapper\Api\ResponseParser;
use BookApiWrapper\Entity\Author;

class BookApiWrapper
{
    private $client;

    public function __construct(ApiClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAuthors($limit = 0, $offset = 0)
    {
        $endpoint = EndpointBuilder::getAuthors($limit, $offset);
        $responseBody = $this->client->get($endpoint);

        $responseParser = new ResponseParser($responseBody);

        $response = $responseParser->parse();

        if ($response->status !== Response::STATUS_OK) {
            throw new \Exception($response->message);
        }

        $list = [];
        foreach ($response->data->authors as $author) {
            $list[] = new Author($author->id, $author->name);
        }
        return $list;

    }
}