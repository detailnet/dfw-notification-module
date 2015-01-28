<?php

namespace Detail\Notification\Sender;

interface SenderInterface
{
    public function send(array $payload, array $params = array());
}
