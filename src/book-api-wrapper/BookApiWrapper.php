<?php
/**
 */

namespace BookApiWrapper;

use BookApiWrapper\Api\ApiClientInterface;
use BookApiWrapper\Api\CurlRequest;
use BookApiWrapper\Entity\AuthorsList;
use BookApiWrapper\Entity\BooksList;

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

    /**
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws \Exception
     */
    public function getAuthors($limit = 0, $offset = 0)
    {
        return (new AuthorsList($this->client))->fetchAll($limit, $offset);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws \Exception
     */
    public function getBooks($limit = 0, $offset = 0)
    {
        return (new BooksList($this->client))->fetchAll($limit, $offset);
    }

    /**
     * fetch books filtered by author
     *
     * @param $authorId
     * @param int $limit
     * @param int $offset
     * @return array
     * @throws \Exception
     */
    public function getAuthorBooks($authorId, $limit = 0, $offset = 0)
    {
        return (new BooksList($this->client))->fetchAllByAuthorId($authorId, $limit, $offset);
    }
}