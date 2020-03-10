<?php

declare(strict_types=1);

namespace Router\Application;

use Router\Component\Request;
use Router\Router;

/**
 * Class AbstractApplication
 */
abstract class AbstractApplication
{
    /**
     * @var Router
     */
    private Router $router;

    /**
     * @var Request
     */
    private Request $request;

    /**
     * AbstractApplication constructor.
     *
     * @param Router $router
     */
    final public function __construct(Router $router)
    {
        $this->router = $router;
        $this->request = $this->createRequest();
    }

    /**
     * @return Request
     */
    abstract protected function createRequest(): Request;

    final public function run(): void
    {
    }
}
