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

try {
    if (IS_CONSOLE) {
        $application = new ConsoleApplication();
    } else {
        $application = new HttpApplication();
    }

    $application->run();
} catch (Exception $exception) {
    echo $exception->getMessage(), PHP_EOL;
    echo $exception->getTraceAsString(), PHP_EOL;

    if (IS_CONSOLE) {
        exit(1);
    } else {
        http_response_code(500);
    }
}

//    var_dump($argv, file_get_contents('php://input'), file_get_contents('php://stdin'));