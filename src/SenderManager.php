<?php

namespace Detail\Notification;

use Zend\ServiceManager\AbstractPluginManager;

/**
 * Plugin manager implementation for notification senders.
 *
 * Enforces that senders retrieved are instances of SenderInterface.
 */
class SenderManager extends AbstractPluginManager implements
    SenderManagerInterface
{
    /**
     * @var string
     */
    protected $instanceOf = Sender\SenderInterface::CLASS;

    /**
     * @param string $type
     * @return boolean
     */
    public function hasSender($type)
    {
        return $this->has($type);
    }

    /**
     * @param string $type
     * @param array $options
     * @return Sender\SenderInterface
     */
    public function getSender($type, $options = [])
    {
        return $this->get($type, $options);
    }
}
