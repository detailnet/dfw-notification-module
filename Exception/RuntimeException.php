<?php

namespace Application\Job\Application\Notification\Exception;

use Application\Job\Domain\Exception as DomainException;

class RuntimeException extends DomainException\RuntimeException implements
    ExceptionInterface
{
}
