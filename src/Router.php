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
     * @var Route|null
     */
    private ?Route $default = null;

    /**
     * @var array
     */
    private array $routes = [];

    /**
     * @param Route $default
     */
    public function setDefault(Route $default): void
    {
        $this->default = $default;
    }

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
    public function match(Request $request): Match
    {
    }
}
