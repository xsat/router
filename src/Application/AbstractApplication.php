<?php

declare(strict_types=1);

namespace Router\Application;

use Router\Component\Request;
use Router\Component\Response;
use Router\Controller\AbstractController;
use Router\Router;
use RuntimeException;

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

    /**
     * @throws RuntimeException then action is invalid
     * @throws RuntimeException then controller is invalid
     * @throws RuntimeException then method is undefined
     * @throws RuntimeException then response is invalid
     */
    final public function run(): void
    {
        $route = $this->router->match($this->request);

        if ($route !== null) {
            $arguments = explode('::', $route->getAction());

            if (empty($arguments[0]) || empty($arguments[1])) {
                throw new RuntimeException(
                    "`{$route->getAction()}` action is invalid"
                );
            }

            if (!is_subclass_of($arguments[0], AbstractController::class)) {
                throw new RuntimeException(
                    "`{$route->getAction()}` controller is invalid"
                );
            }

            $controller = new $arguments[0]($this->request);

            if (!method_exists($controller, $arguments[1])) {
                throw new RuntimeException(
                    "`{$route->getAction()}` method is undefined"
                );
            }

            /** @var Response $response */
            $response = $controller->{$arguments[1]}();

            if (!is_a($response, Response::class)) {
                throw new RuntimeException(
                    "`{$route->getAction()}` response is invalid"
                );
            }

            $response->send();
        }
    }
}
