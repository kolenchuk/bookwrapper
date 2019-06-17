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
    /**
     * @var ApiClientInterface
     */
    private $client;

    public function __construct(ApiClientInterface $client = null)
    {
        if (is_null($client)) {
            $client = new CurlRequest();
        }
        $this->client = $client;
    }

    public function getAuthors($limit = 0, $offset = 0)
    {
        $endpoint = EndpointBuilder::getAuthors($limit, $offset);

        try {
            $responseBody = $this->client->get($endpoint);

            $responseParser = new ResponseParser($responseBody);

            $response = $responseParser->parse();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }


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