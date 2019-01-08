<?php

namespace DetailTest\Notification\Factory\Options;

use PHPUnit\Framework\TestCase;

use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\ServiceManager;

use Detail\Notification\Factory\Options\ModuleOptionsFactory;
use Detail\Notification\Options;

class ModuleOptionsFactoryTest extends TestCase
{
    public function testCreateService(): void
    {
        $moduleOptions = $this->createModuleOptions(['detail_notification' => []]);

        $this->assertInstanceOf(Options\ModuleOptions::CLASS, $moduleOptions);
    }

    public function testCreateServiceThrowsExceptionForInvalidConfiguration(): void
    {
        $this->expectException(ServiceNotCreatedException::CLASS);
        $this->createModuleOptions();
    }

    protected function createModuleOptions(array $options = []): Options\ModuleOptions
    {
        $serviceManager = new ServiceManager();
        $serviceManager->setService('Config', $options);

        $factory = new ModuleOptionsFactory();

        return $factory->__invoke($serviceManager, Options\ModuleOptions::CLASS);
    }
}
