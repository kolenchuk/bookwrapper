<?php
/**
 */

class MockBadFormatRequest implements \BookApiWrapper\Api\ApiClientInterface
{
    public function get($endpoint)
    {
        return '';
    }
}