<?php

namespace Application\Job\Application\Notification\Sender;

interface SenderInterface
{
    public function send(array $params = array());
}
