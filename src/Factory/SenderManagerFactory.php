<?php

namespace Detail\Notification\Factory;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\FactoryInterface;

use Detail\Notification\Options\ModuleOptions;
use Detail\Notification\SenderManager;

class SenderManagerFactory implements
    FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return SenderManager
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);

        $senders = new SenderManager($container);

        foreach ($moduleOptions->getSenderFactories() as $senderType => $senderFactory) {
            $senders->setFactory($senderType, $senderFactory);
        }

        return $senders;
    }
}
