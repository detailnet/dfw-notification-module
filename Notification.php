<?php

namespace Application\Job\Application\Notification;

class Notification implements
    NotificationInterface
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $params;

    /**
     * @param string $type
     * @param array $params
     */
    public function __construct($type, array $params = array())
    {
        $this->type = $type;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}
