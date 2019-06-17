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

    public function testWrapperCall()
    {
        $wrapper = new BookApiWrapper();
    }
}