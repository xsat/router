<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'on');
define('IS_CONSOLE', !empty($argv[0]));

require __DIR__ .
    DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

use Router\Application\ConsoleApplication;
use Router\Application\HttpApplication;
use Router\Controller\IndexController;
use Router\Controller\NotFoundController;
use Router\Route;
use Router\Router;

try {
    $router = new Router();
    /** @see NotFoundController::index() */
    $router->setDefault(
        new Route('Router\Controller\NotFoundController::index')
    );
    /** @see IndexController::index() */
    $router->addRoute(
        new Route('Router\Controller\IndexController::index', 'run.php')
    );

    if (IS_CONSOLE) {
        $application = new ConsoleApplication($router);
    } else {
        $application = new HttpApplication($router);
    }

    $application->run();
} catch (Exception $exception) {
    echo $exception->getMessage(), PHP_EOL;
    echo $exception->getTraceAsString(), PHP_EOL;

    http_response_code(500);
}
