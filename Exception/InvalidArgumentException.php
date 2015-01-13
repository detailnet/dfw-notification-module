<?php

namespace Application\Job\Application\Notification\Exception;

use Application\Job\Domain\Exception as DomainException;

class InvalidArgumentException extends DomainException\InvalidArgumentException implements
    ExceptionInterface
{
}
