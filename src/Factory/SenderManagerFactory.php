<?php

namespace Detail\Notification\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\Notification\SenderManager;

class SenderManagerFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return SenderManager
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Detail\Notification\Options\ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Detail\Notification\Options\ModuleOptions');

        $senders = new SenderManager();
        $senders->setServiceLocator($serviceLocator);

        foreach ($moduleOptions->getSenderFactories() as $senderType => $senderFactory) {
            $senders->setFactory($senderType, $senderFactory);
        }

        return $senders;
    }
}
