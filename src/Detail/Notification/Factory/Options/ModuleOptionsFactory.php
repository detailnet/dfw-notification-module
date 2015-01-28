<?php

namespace Detail\Notification\Factory\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\Notification\Exception\ConfigException;
use Detail\Notification\Options\ModuleOptions;

class ModuleOptionsFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return ModuleOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['detail_notification'])) {
            throw new ConfigException('Config for Detail\Notification is not set');
        }

        return new ModuleOptions($config['detail_notification']);
    }
}
