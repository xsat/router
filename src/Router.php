<?php

declare(strict_types=1);

namespace Router;

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


}
