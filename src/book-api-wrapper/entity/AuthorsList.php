<?php
/**
 */

namespace BookApiWrapper\Entity;


use BookApiWrapper\Api\EndpointBuilder;
use \Exception;

class AuthorsList extends AbstractEntitiesList
{
    /**
     * @param $data
     * @return array
     * @throws Exception
     */
    protected function getParsedData($data)
    {
        $list = [];
        foreach ($data->authors as $author) {
            if (!is_object($author)) {
                throw new Exception("Bad data format");
            }
            $list[] = new Author($author->id, $author->name);
        }
        return $list;
    }

    protected function getEndpoint($limit = 0, $offset = 0)
    {
        return EndpointBuilder::getAuthors($limit, $offset);
    }
}