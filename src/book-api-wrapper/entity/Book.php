<?php
/**
 */

namespace BookApiWrapper\Entity;

/**
 * Class Book
 * @package BookApiWrapper\Entity
 *
 * @property int $id
 * @property string $title
 * @property Author $author
 */
class Book extends BaseEntity
{
    /**
     * @var int
     */
    private $_id;

    /**
     * @var string
     */
    private $_title;

    /**
     * @var Author
     */
    private $_author;

    public function __construct($id, $title, $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->_title = $title;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor(Author $author)
    {
        $this->_author = $author;
    }


}