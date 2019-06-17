<?php
/**
 */

namespace BookApiWrapper\Api;


class EndpointBuilder
{

    /**
     * Get endpoint for authors request
     *
     * @param int $limit
     * @param int $offset
     * @return string
     */
    public static function getAuthors($limit = 0, $offset = 0)
    {
        $params = [];
        if (!empty($limit)) {
            $params[] = 'limit=' . $limit;
        }

        if (!empty($offset)) {
            $params[] = 'offset=' . $offset;
        }

        return 'http://94.254.0.188:4000/authors' . ((!empty($params)) ? '?' . implode('&', $params) : '');
    }

    public static function getBooks($limit = 0, $offset = 0)
    {
        $params = [];
        if (!empty($limit)) {
            $params[] = 'limit=' . $limit;
        }

        if (!empty($offset)) {
            $params[] = 'offset=' . $offset;
        }

        return 'http://94.254.0.188:4000/books' . ((!empty($params)) ? '?' . implode('&', $params) : '');
    }
}