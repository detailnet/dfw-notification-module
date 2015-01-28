<?php

namespace Detail\Notification;

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
     * @param array $payload
     * @param array $params
     * @return Notification
     */
    public function createNotification($type, array $payload, array $params = array())
    {
        return new Notification($type, $payload, $params);
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
        $call = $sender->send($notification->getPayload(), $notification->getParams());

        return $call;
    }
}
