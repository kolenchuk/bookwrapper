<?php
/**
 */

namespace BookApiWrapper\Entity;


use BookApiWrapper\Api\EndpointBuilder;
use BookApiWrapper\Api\Response;
use BookApiWrapper\Api\ResponseParser;
use \Exception;

class BooksList extends AbstractEntitiesList
{
    /**
     * fetch books filtered by author
     *
     * @param $authorId
     * @param int $limit
     * @param int $offset
     * @return array
     * @throws Exception
     */
    public function fetchAllByAuthorId($authorId, $limit = 0, $offset = 0)
    {
        $endpoint = $this->getEndpointByAuthor($authorId, $limit, $offset);

        try {
            $responseBody = $this->client->get($endpoint);

            $responseParser = new ResponseParser($responseBody);

            $response = $responseParser->parse();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }

        if ($response->status !== Response::STATUS_OK || !is_object($response->data)) {
            throw new Exception($response->message);
        }

        return $this->getParsedData($response->data);
    }


    /**
     * @param $data
     * @return array
     * @throws Exception
     */
    protected function getParsedData($data)
    {
        $list = [];

        foreach ($data->books as $book) {
            if (!is_object($book)) {
                throw new Exception("Bad data format");
            }
            $author = new Author($book->author->id, $book->author->name);
            $list[] = new Book($book->id, $book->title, $author);
        }
        return $list;
    }

    protected function getEndpoint($limit = 0, $offset = 0)
    {
        return EndpointBuilder::getBooks($limit, $offset);
    }

    protected function getEndpointByAuthor($authorId, $limit = 0, $offset = 0)
    {
        return EndpointBuilder::getAuthorBooks($authorId, $limit, $offset);
    }
}