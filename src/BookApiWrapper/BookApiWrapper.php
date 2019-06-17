<?php
/**
 */

namespace BookApiWrapper;

use BookApiWrapper\Entity\Author;

class BookApiWrapper
{
    public function getAuthors($limit = 0, $offset = 0)
    {
        return [
            new Author(1, "a1"),
            new Author(2, "a2"),
        ];
    }
}