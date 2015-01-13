<?php

namespace Application\Job\Application\Notification\Service;

use Application\Job\Application\Notification\NotifierInterface;

trait NotifierAwareTrait
{
    /**
     * @var NotifierInterface
     */
    protected $notifier;

    /**
     * @return NotifierInterface
     */
    public function getNotifier()
    {
        return $this->notifier;
    }

    /**
     * @param NotifierInterface $notifier
     */
    public function setNotifier(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }
}
