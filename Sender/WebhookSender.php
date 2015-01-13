<?php

namespace Application\Job\Application\Notification\Sender;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\BadResponseException as HttpException;

use Application\Job\Application\Notification\Call;
//use Application\Job\Application\Notification\Exception;

class WebhookSender extends BaseSender
{
    const PARAM_URL    = 'url';
    const PARAM_METHOD = 'method';

    protected $requiredParams = array(
        self::PARAM_URL,
    );

    protected $defaultParams = array(
        self::PARAM_METHOD => 'GET',
    );

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->setHttpClient($httpClient);
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param HttpClient $httpClient
     */
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function send(array $params = array())
    {
        $params = $this->validateParams($params);

        $getParam = function($key, $default = null) use ($params) {
            return array_key_exists($key, $params) ? $params[$key] : $default;
        };

        /** @todo Validate URL? */
        $url = $getParam(self::PARAM_URL);
        $method = strtoupper($getParam(self::PARAM_METHOD, 'GET'));

        $httpClient = $this->getHttpClient();
        $httpRequest = $httpClient->createRequest($method, $url);

        $error = null;

        try {
            $httpResponse = $httpClient->send($httpRequest);

        } catch (HttpException $e) {
            $error = $e;
        }

        $call = new Call($error);

        return $call;
    }
}
