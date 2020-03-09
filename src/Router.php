<?php

declare(strict_types=1);

namespace Router;

use Router\Component\Request;

/**
 * Class Router
 */
class Router
{
    /**
     * @var array
     */
    private array $routes = [];

    /**
     * @param Route $route
     */
    public function addRoute(Route $route): void
    {
        $this->routes[] = $route;
    }

    /**
     * @param Request $request
     *
     * @return Match
     */
    public function match(Request $request): Match {

    }
}
