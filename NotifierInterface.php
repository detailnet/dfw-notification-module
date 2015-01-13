<?php

namespace Application\Job\Application\Notification;

interface NotifierInterface
{
    /**
     * @param string $type
     * @param array $params
     * @return NotificationInterface
     */
    public function createNotification($type, array $params = array());

    /**
     * @param NotificationInterface $notification
     * @return CallInterface
     */
    public function sendNotification(NotificationInterface $notification);
}
