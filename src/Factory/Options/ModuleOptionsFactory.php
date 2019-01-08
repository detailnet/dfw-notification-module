<?php

namespace Detail\Notification\Factory\Options;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Detail\Notification\Options\ModuleOptions;

class ModuleOptionsFactory implements
    FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ModuleOptions
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');

        if (!isset($config['detail_notification'])) {
            throw new ServiceNotCreatedException('Config for Detail\Notification is not set');
        }

        return new ModuleOptions($config['detail_notification']);
    }
}
