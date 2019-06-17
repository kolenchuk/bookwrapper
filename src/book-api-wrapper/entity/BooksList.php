<?php
/**
 */

namespace BookApiWrapper\Entity;


use BookApiWrapper\Api\EndpointBuilder;
use \Exception;

class BooksList extends AbstractEntitiesList
{
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
}