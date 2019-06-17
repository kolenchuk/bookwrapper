<?php
/**
 */

namespace BookApiWrapper\Entity;

/**
 * Class Author
 * @package BookApiWrapper\Entity
 *
 * @property int $id
 * @property string $name
 *
 */
class Author extends BaseEntity
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
        $this->id = $id;

        $this->name = $name;
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