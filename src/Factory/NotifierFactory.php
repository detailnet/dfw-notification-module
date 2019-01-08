<?php

namespace Detail\Notification\Factory;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\Notification\Notifier;
use Detail\Notification\SenderManager;

class NotifierFactory implements
    FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Notifier
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var SenderManager $senders */
        $senders = $container->get(SenderManager::CLASS);

        return new Notifier($senders);
    }
}
