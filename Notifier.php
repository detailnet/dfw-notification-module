<?php

namespace Application\Job\Application\Notification;

class Notifier implements
    NotifierInterface
{
    /**
     * @var SenderManager
     */
    protected $senders;

    /**
     * @param SenderManager $senders
     */
    public function __construct(SenderManager $senders)
    {
        $this->setSenders($senders);
    }

    /**
     * @return SenderManager
     */
    public function getSenders()
    {
        return $this->senders;
    }

    /**
     * @param SenderManager $senders
     */
    public function setSenders(SenderManager $senders)
    {
        $this->senders = $senders;
    }

    /**
     * @param string $type
     * @param array $params
     * @return Notification
     */
    public function createNotification($type, array $params = array())
    {
        return new Notification($type, $params);
    }

    /**
     * @param NotificationInterface $notification
     * @return CallInterface
     */
    public function sendNotification(NotificationInterface $notification)
    {
        $senders = $this->getSenders();

        if (!$senders->has($notification->getType())) {
            throw new Exception\RuntimeException(
                sprintf('No sender registered for notification type "%s"', $notification->getType())
            );
        }

        $sender = $senders->get($notification->getType());

        var_dump($sender->send($notification->getParams()));
        exit;
    }


}
