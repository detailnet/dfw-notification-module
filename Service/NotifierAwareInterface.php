<?php

namespace Application\Job\Application\Notification\Service;

use Application\Job\Application\Notification\NotifierInterface;

interface NotifierAwareInterface
{
    /**
     * @param NotifierInterface $notifier
     */
    public function setNotifier(NotifierInterface $notifier);
}
