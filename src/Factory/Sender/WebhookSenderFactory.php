<?php

namespace Detail\Notification\Factory\Sender;

use Interop\Container\ContainerInterface;

use Zend\ServiceManager\Factory\FactoryInterface;

use GuzzleHttp\Client as HttpClient;

use Detail\Notification\Options\ModuleOptions;
use Detail\Notification\Options\Sender\WebhookSenderOptions;
use Detail\Notification\Sender\WebhookSender as Sender;

class WebhookSenderFactory implements
    FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return Sender
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var ModuleOptions $moduleOptions */
        $moduleOptions = $container->get(ModuleOptions::CLASS);

        /** @var WebhookSenderOptions $senderOptions */
        $senderOptions = $moduleOptions->getSender('webhook', WebhookSenderOptions::CLASS);

        /** @todo Fetch from ServiceLocator by configurable name (provided through options) */
        $httpClient = new HttpClient(
            [
                'headers' => ['User-Agent' => $senderOptions->getUserAgent()],
                //'verify' => $senderOptions->getVerify() /** @todo Enable as soon as option is available */
            ]
        );

        return new Sender($httpClient);
    }
}
