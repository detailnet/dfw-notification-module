<?php

namespace Application\Job\Application\Notification;

use DateTime;
use Exception;

interface CallInterface
{
    /**
     * @return boolean
     */
    public function isSuccess();

    /**
     * @return boolean
     */
    public function isError();

    /**
     * @return string|Exception|null
     */
    public function getError();

    /**
     * @return string|null
     */
    public function getErrorMessage();

    /**
     * @return DateTime
     */
    public function getSentOn();
}
