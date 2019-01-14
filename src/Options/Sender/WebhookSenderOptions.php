<?php

namespace Detail\Notification\Options\Sender;

use Zend\Stdlib\AbstractOptions;

class WebhookSenderOptions extends AbstractOptions
{
    /**
     * @var string
     */
    protected $userAgent;

    /**
     * @var bool
     */
    protected $verifySslCert = true;

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

    /**
     * @return bool
     */
    public function getVerifySslCert()
    {
        return $this->verifySslCert;
    }

    /**
     * @param bool $verify
     */
    public function setVerifySslCert($verify)
    {
        $this->verifySslCert = (bool) $verify;
    }
}
