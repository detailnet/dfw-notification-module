<?php

return [
    'service_manager' => [
        'abstract_factories' => [
        ],
        'aliases' => [
        ],
        'invokables' => [
        ],
        'factories' => [
            'Detail\Notification\Notifier' => 'Detail\Notification\Factory\NotifierFactory',
            'Detail\Notification\SenderManager' => 'Detail\Notification\Factory\SenderManagerFactory',
            'Detail\Notification\Options\ModuleOptions' => 'Detail\Notification\Factory\Options\ModuleOptionsFactory',
        ],
        'initializers' => [
            'Detail\Notification\Service\NotifierInitializer',
        ],
        'shared' => [
        ],
    ],
    'controllers' => [
        'initializers' => [
            'Detail\Notification\NotifierInitializer',
        ],
    ],
    'detail_notification' => [
        'sender_factories' => [
            'webhook' => 'Detail\Notification\Factory\Sender\WebhookSenderFactory',
        ],
        'senders' => [
            'webhook' => [
                'user_agent' => 'dfw-notification/1.0.0',
            ],
        ],
    ],
];
