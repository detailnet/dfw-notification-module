<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'invokables' => array(
        ),
        'factories' => array(
            'Detail\Notification\Notifier'              => 'Detail\Notification\Factory\NotifierFactory',
            'Detail\Notification\SenderManager'         => 'Detail\Notification\Factory\SenderManagerFactory',
            'Detail\Notification\Options\ModuleOptions' => 'Detail\Notification\Factory\Options\ModuleOptionsFactory',
        ),
        'initializers' => array(
            'Detail\Notification\Service\NotifierInitializer',
        ),
        'shared' => array(
        ),
    ),
    'controllers' => array(
        'initializers' => array(
            'Detail\Notification\Service\NotifierInitializer',
        ),
    ),
    'detail_notification' => array(
        'sender_factories' => array(
            'webhook' => 'Detail\Notification\Factory\Sender\WebhookSenderFactory',
        ),
        'senders' => array(
            'webhook' => array(
                'user_agent' => 'dfw-notification/0.1.0',
            ),
        ),
    ),
);
