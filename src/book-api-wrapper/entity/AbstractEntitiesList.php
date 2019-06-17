<?php
/**
 */

namespace BookApiWrapper\Entity;


use BookApiWrapper\Api\ApiClientInterface;
use BookApiWrapper\Api\CurlRequest;
use BookApiWrapper\Api\Response;
use BookApiWrapper\Api\ResponseParser;
use \Exception;

abstract class AbstractEntitiesList
{
    /**
     * @var ApiClientInterface|null
     */
    protected $client;

    public function __construct(ApiClientInterface $client = null)
    {
        if (is_null($client)) {
            $client = new CurlRequest();
        }
        $this->client = $client;
    }

    /**
     * Fetch api data to array
     *
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws Exception
     */
    public function fetchAll($limit = 0, $offset = 0)
    {
        $endpoint = $this->getEndpoint($limit, $offset);

        try {
            $responseBody = $this->client->get($endpoint);

            $responseParser = new ResponseParser($responseBody);

            $response = $responseParser->parse();
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }


        if ($response->status !== Response::STATUS_OK || !is_object($response->data)) {
            throw new Exception($response->message);
        }

        return $this->getParsedData($response->data);
    }

    abstract protected function getParsedData($data);

    abstract  protected function getEndpoint($limit = 0, $offset = 0);
}