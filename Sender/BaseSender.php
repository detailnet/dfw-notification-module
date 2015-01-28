<?php

namespace Application\Job\Application\Notification\Sender;

use Application\Job\Application\Notification\Exception;

abstract class BaseSender implements
    SenderInterface
{
    /**
     * @var array
     */
    protected $requiredParams = array();

    /**
     * @var array
     */
    protected $defaultParams = array();

    /**
     * @return array
     */
    public function getRequiredParams()
    {
        return $this->requiredParams;
    }

    /**
     * @return array
     */
    public function getDefaultParams()
    {
        return $this->defaultParams;
    }

    /**
     * @param array $params
     * @return array
     */
    protected function validateParams(array $params = array())
    {
        $requiredParams = $this->getRequiredParams();

        foreach ($requiredParams as $requiredParam) {
            if (!array_key_exists($requiredParam, $params)) {
                throw new Exception\InvalidArgumentException(
                    sprintf('Missing required param "%s"', $requiredParam)
                );
            }
        }

        return $params;
    }
}
