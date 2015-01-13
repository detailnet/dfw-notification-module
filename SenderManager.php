<?php

namespace Application\Job\Application\Notification;

use Zend\ServiceManager\AbstractPluginManager;

use Application\Job\Application\Notification\Sender\SenderInterface;

/**
 * Plugin manager implementation for notification senders.
 *
 * Enforces that senders retrieved are instances of SenderInterface.
 */
class SenderManager extends AbstractPluginManager
{
    /**
     * Whether or not to share by default
     *
     * @var bool
     */
    protected $shareByDefault = false;

    /**
     * {@inheritDoc}
     */
    public function has($name, $checkAbstractFactories = true, $usePeeringServiceManagers = true)
    {
        return parent::has($name, true, false); // Don't look in peering service managers
    }

    /**
     * {@inheritDoc}
     */
    public function get($name, $options = array(), $usePeeringServiceManagers = true)
    {
        return parent::get($name, $options, false); // Don't look in peering service managers
    }

    /**
     * {@inheritDoc}
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof SenderInterface) {
            // We're okay
            return;
        }

        throw new Exception\RuntimeException(
            sprintf(
                'Sender of type %s is invalid; must implement %s\Sender\SenderInterface',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
                __NAMESPACE__
            )
        );
    }
}
