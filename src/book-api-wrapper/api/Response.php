<?php
/**
 */

namespace BookApiWrapper\Api;

class Response
{
    const STATUS_OK = 'OK';
    const STATUS_INVALID_REQUEST = 'INVALID_REQUEST';
    const STATUS_NOT_FOUND = 'NOT_FOUND';
    const STATUS_ERROR = 'ERROR';

    public $status = self::STATUS_ERROR;
    public $message = 'Bad response data format';
    public $data;
}