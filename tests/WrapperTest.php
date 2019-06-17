<?php
/**
 */

use \BookApiWrapper\BookApiWrapper;

require_once 'mocks/MockAuthorRequest.php';
require_once 'mocks/MockBadFormatRequest.php';

class WrapperTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testGetAuthors()
    {
        $client = new MockAuthorRequest();
        $wrapper = new BookApiWrapper($client);

        $authorsCount = 2;
        $authors = $wrapper->getAuthors($authorsCount);
        $this->assertInternalType('array', $authors);

        $this->assertEquals($authorsCount, count($authors));
        $first = $authors[0];
        $this->assertInstanceOf('BookApiWrapper\Entity\Author', $first);
    }

    public function testBadFormatResponse()
    {
        $client = new MockBadFormatRequest();
        $wrapper = new BookApiWrapper($client);

        $this->expectException(Exception::class);
        $wrapper->getAuthors();
    }
}