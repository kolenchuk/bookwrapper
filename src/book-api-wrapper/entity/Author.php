<?php
/**
 */

namespace BookApiWrapper\Entity;

class Author
{
    /**
     * @var int
     */
    private $_id;

    /**
     * @var string
     */
    private $_name;

    public function __construct(int $id, string $name)
    {
        $this->_id = $id;

        $this->_name = $name;
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
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->_name = $name;
    }


}