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
use Router\Component\Request;
use Router\Controller\IndexController;
use Router\Controller\NotFoundController;
use Router\Route;
use Router\Router;

try {
    $router = new Router();
    /** @see NotFoundController::index() */
    $router->setDefault(new Route('NotFoundController::index'));
    /** @see IndexController::index() */
    $router->addRoute(new Route('IndexController::index', '/', Request::GET));
    /** @see IndexController::test() */
    $router->addRoute(new Route('IndexController::test', '/', Request::POST));

    if (IS_CONSOLE) {
        $application = new ConsoleApplication($router);
    } else {
        $application = new HttpApplication($router);
    }

    $application->run();
} catch (Exception $exception) {
    echo $exception->getMessage(), PHP_EOL;
    echo $exception->getTraceAsString(), PHP_EOL;
}

//    var_dump($argv, file_get_contents('php://input'), file_get_contents('php://stdin'));