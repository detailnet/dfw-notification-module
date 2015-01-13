<?php

namespace Application\Job\Application\Notification;

use DateTime;

interface CallInterface
{
    /**
     * @return boolean
     */
    public function isSuccess();

    /**
     * @return DateTime
     */
    public function getSentOn();
}
