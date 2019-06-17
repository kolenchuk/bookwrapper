<?php
/**
 */

use \BookApiWrapper\BookApiWrapper;

class WrapperTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testGetAuthors()
    {
        $wrapper = new BookApiWrapper();

        $authorsCount = 2;
        $authors = $wrapper->getAuthors($authorsCount);
        $this->assertInternalType('array', $authors);

        $this->assertEquals($authorsCount, count($authors));
        $first = $authors[0];
        $this->assertInstanceOf('BookApiWrapper\Entity\Author', $first);
    }
}