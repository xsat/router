<?php

declare(strict_types=1);

namespace Router\Application;

/**
 * Class AbstractApplication
 */
abstract class AbstractApplication
{
    final public function run(): void
    {
        throw new \Exception('Error');
    }
}
