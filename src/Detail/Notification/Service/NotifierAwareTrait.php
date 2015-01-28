<?php

namespace Detail\Notification\Service;

use Detail\Notification\NotifierInterface;

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
