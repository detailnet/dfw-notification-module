<?php

namespace Detail\Notification\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\Notification\Notifier;

class NotifierFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return Notifier
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
//        /** @var \Detail\Notification\Options\ModuleOptions $moduleOptions */
//        $moduleOptions = $serviceLocator->get('Detail\Notification\Options\ModuleOptions');

        /** @var \Detail\Notification\SenderManager $senders */
        $senders = $serviceLocator->get('Detail\Notification\SenderManager');

        return new Notifier($senders);
    }
}
