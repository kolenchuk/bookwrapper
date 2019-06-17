<?php
/**
 */

namespace BookApiWrapper\Api;


class EndpointBuilder
{
    private static function getBaseEndpoint()
    {
        return 'http://94.254.0.188:4000';
    }

    private static function getParams($limit, $offset)
    {
        $params = [];
        if (!empty($limit)) {
            $params[] = 'limit=' . $limit;
        }

        if (!empty($offset)) {
            $params[] = 'offset=' . $offset;
        }

        return (!empty($params)) ? '?' . implode('&', $params) : '';
    }

    /**
     * Get endpoint for authors request
     *
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public static function getAuthors($limit = 0, $offset = 0)
    {
        return static::getBaseEndpoint() . '/authors' . static::getParams($limit, $offset);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public static function getBooks($limit = 0, $offset = 0)
    {
        return static::getBaseEndpoint() . '/books' . static::getParams($limit, $offset);
    }

    /**
     * @param $authorId
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public static function getAuthorBooks($authorId, $limit = 0, $offset = 0)
    {
        return static::getBaseEndpoint() . '/authors/' . $authorId . '/books' . static::getParams($limit, $offset);
    }
}