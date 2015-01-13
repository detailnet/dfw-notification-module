<?php

namespace Application\Job\Application\Notification\Sender;

class WebhookSender extends BaseSender
{
    const PARAM_URL = 'url';

    protected $requiredParams = array(
        self::PARAM_URL,
    );

    public function send(array $params = array())
    {
        /** @todo Implement */
        return $params;
    }
}
