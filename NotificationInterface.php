<?php

namespace Application\Job\Application\Notification;

interface NotificationInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @return array
     */
    public function getParams();
}
