<?php
/**
 */

class MockBookRequest implements \BookApiWrapper\Api\ApiClientInterface
{
    public function get($endpoint)
    {
        return '{
          "status": "OK",
          "message": "Ok",
          "data": {
            "books": [
              {
                "id": 1,
                "title": "Cryptonomicon",
                "author": {
                  "id": 1,
                  "name": "Nil Stevenson"
                }
              },
              {
                "id": 2,
                "title": "Snow Crash",
                "author": {
                  "id": 1,
                  "name": "Nil Stevenson"
                }
              }
            ],
            "limit": 2,
            "offset": 0,
            "rows": 6
          }
        }';
    }
}