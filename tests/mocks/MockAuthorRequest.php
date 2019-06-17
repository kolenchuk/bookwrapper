<?php
/**
 */

class MockAuthorRequest implements \BookApiWrapper\Api\ApiClientInterface
{
    public function get($endpoint)
    {
        return '{
          "status": "OK",
          "message": "Ok",
          "data": {
            "authors": [
              {
                "id": 1,
                "name": "Nil Stevenson"
              },
              {
                "id": 2,
                "name": "William Gibson"
              }
            ],
            "limit": 0,
            "offset": 0,
            "rows": 2
          }
        }';
    }

}