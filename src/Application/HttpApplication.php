<?php

declare(strict_types=1);

namespace Router\Application;

use Router\Component\Request;

/**
 * Class HttpApplication
 */
class HttpApplication extends AbstractApplication
{
    /**
     * {@inheritDoc}
     */
    protected function createRequest(): Request
    {
        if (isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        } elseif (isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
            $method = strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']);
        } elseif (isset($_SERVER['REQUEST_METHOD'])) {
            $method = strtoupper($_SERVER['REQUEST_METHOD']);
        } else {
            $method = Request::GET;
        }

        if (isset($_SERVER['REQUEST_URI'])) {
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: null;
        }

        return new Request(
            $method,
            $path ?? '/',
            array_merge(
                $_GET,
                $_POST,
                json_decode(
                    file_get_contents('php://input'),
                    true
                ) ?: []
            ),
        );
    }
}
