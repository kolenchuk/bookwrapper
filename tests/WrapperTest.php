<?php
/**
 */

use \BookApiWrapper\BookApiWrapper;

require_once 'mocks/MockAuthorRequest.php';
require_once 'mocks/MockBadFormatRequest.php';
require_once 'mocks/MockBookRequest.php';

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

    public function testGetBooks()
    {
        $client = new MockBookRequest();
        $wrapper = new BookApiWrapper($client);

        $booksCount = 2;
        $books = $wrapper->getBooks($booksCount);
        $this->assertInternalType('array', $books);

        $this->assertEquals($booksCount, count($books));
        $first = $books[0];
        $this->assertInstanceOf('BookApiWrapper\Entity\Book', $first);
    }

    public function testGetAuthorsBooks()
    {
        $client = new MockBookRequest();
        $wrapper = new BookApiWrapper($client);

        $booksCount = 2;
        $books = $wrapper->getAuthorBooks(1, $booksCount);
        $this->assertInternalType('array', $books);

        $this->assertEquals($booksCount, count($books));
        $first = $books[0];
        $this->assertInstanceOf('BookApiWrapper\Entity\Book', $first);
    }
}