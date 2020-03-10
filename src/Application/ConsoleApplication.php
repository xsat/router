<?php

declare(strict_types=1);

namespace Router\Application;

use Router\Component\Request;

/**
 * Class ConsoleApplication
 */
class ConsoleApplication extends AbstractApplication
{
    /**
     * {@inheritDoc}
     */
    protected function createRequest(): Request
    {
        return new Request();
    }
}
