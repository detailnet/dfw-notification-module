<?php

namespace Detail\Notification\Factory\Sender;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

use GuzzleHttp\Client as HttpClient;

use Detail\Notification\Sender\WebhookSender as Sender;

class WebhookSenderFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return Sender
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        if ($serviceLocator instanceof ServiceLocatorAwareInterface) {
            $serviceLocator = $serviceLocator->getServiceLocator();
        }

        /** @var \Detail\Notification\Options\ModuleOptions $moduleOptions */
        $moduleOptions = $serviceLocator->get('Detail\Notification\Options\ModuleOptions');

        /** @var \Detail\Notification\Options\Sender\WebhookSenderOptions $senderOptions */
        $senderOptions = $moduleOptions->getSender(
            'webhook',
            'Detail\Notification\Options\Sender\WebhookSenderOptions'
        );

        /** @todo Fetch from ServiceLocator by configurable name (provided through options) */
        $httpClient = new HttpClient();

        /** @todo Make configurable */
        $httpClient->setDefaultOption(
            'headers',
            array('User-Agent' => $senderOptions->getUserAgent())
        );

        return new Sender($httpClient);
    }
}
