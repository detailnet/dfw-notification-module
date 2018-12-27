<?php

namespace Detail\Notification\Options\Sender;

use Detail\Core\Options\AbstractOptions;

class WebhookSenderOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $userAgent;

    /**
     * @return string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
    }
}
