<?php

namespace Detail\Notification;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Initializer\InitializerInterface;

class NotifierInitializer implements
    InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
     * @return void
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof NotifierAwareInterface) {
            /** @var Notifier $notifier */
            $notifier = $container->get(Notifier::CLASS);

            $instance->setNotifier($notifier);
        }
    }
}
