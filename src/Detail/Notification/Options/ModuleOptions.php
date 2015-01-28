<?php

namespace Detail\Notification\Options;

use Detail\Core\Options\AbstractOptions;
use Detail\Notification\Exception;

class ModuleOptions extends AbstractOptions
{
    /**
     * @var array
     */
    protected $senderFactories = array();

    /**
     * @var array
     */
    protected $senders = array();

    /**
     * @return array
     */
    public function getSenderFactories()
    {
        return $this->senderFactories;
    }

    /**
     * @param array $senderFactories
     */
    public function setSenderFactories(array $senderFactories)
    {
        $this->senderFactories = $senderFactories;
    }

    /**
     * @param string $type
     * @param string $optionsClass
     * @return array|\Detail\Core\Options\AbstractOptions|null
     * @throws Exception\RuntimeException
     */
    public function getSender($type, $optionsClass = null)
    {
        $senders = $this->getSenders();
        $sender = null;

        if (isset($senders[$type])) {
            $sender = $senders[$type];

            if ($optionsClass !== null) {
                if (!class_exists($optionsClass)) {
                    throw new Exception\RuntimeException(
                        sprintf(
                            'Options class "%s" for sender type "%s" does not exist',
                            $optionsClass,
                            $type
                        )
                    );
                }

                $sender = new $optionsClass($sender);
            }
        }

        return $sender;
    }

    /**
     * @return array
     */
    public function getSenders()
    {
        return $this->senders;
    }

    /**
     * @param array $senders
     */
    public function setSenders(array $senders)
    {
        $this->senders = $senders;
    }
}
