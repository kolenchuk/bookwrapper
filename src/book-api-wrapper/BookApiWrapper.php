<?php
/**
 */

namespace BookApiWrapper;

use BookApiWrapper\Api\CurlRequest;
use BookApiWrapper\Api\EndpointBuilder;
use BookApiWrapper\Api\Response;
use BookApiWrapper\Api\ResponseParser;
use BookApiWrapper\Entity\Author;

class BookApiWrapper
{
    public function getAuthors($limit = 0, $offset = 0)
    {
        $endpoint = EndpointBuilder::getAuthors($limit, $offset);
        $request = new CurlRequest();
        $responseBody = $request->get($endpoint);

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