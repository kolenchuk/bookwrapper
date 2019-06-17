<?php
/**
 */

namespace BookApiWrapper\Api;


class CurlRequest
{
    /**
     * @var array default curl options
     * Default curl options
     */
    private $_options = [
        CURLOPT_CUSTOMREQUEST  => 'GET',
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1309.0 Safari/537.17',
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_SSL_VERIFYPEER => false,
    ];

    /**
     * Start performing GET-HTTP-Request
     *
     * @param $url
     * @return mixed
     * @throws \Exception
     */
    public function get($url)
    {
        $curl = curl_init($url);
        curl_setopt_array($curl, $this->_options);
        $body = curl_exec($curl);

        //-- check if curl was successful
        if ($body === false) {
            switch (curl_errno($curl)) {

                case 7:
                    throw new \Exception('curl request timeout');
                    break;

                default:
                    throw new \Exception('curl request failed: ' . curl_error($curl) , curl_errno($curl));
                    break;
            }
        }

        return $body;
    }
}