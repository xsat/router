<?php

declare(strict_types=1);

namespace Router\Application;

use Router\Component\Request;

/**
 * Class ConsoleApplication
 */
class ConsoleApplication extends AbstractApplication
{
    /**
     * {@inheritDoc}
     */
    protected function createRequest(): Request
    {
        $params = $GLOBALS['argv'] ?? [];
        $data = [];

        foreach (array_splice($params, 1) as $param) {
            if (preg_match('#^--(.*)=(.*)$#isU', $param, $matches)) {
                $data[$matches[1]] = $matches[2];
            }
        }

        return new Request(
            Request::GET,
            $params[0] ?? '/',
            array_merge(
                $data,
                json_decode(
                    file_get_contents('php://stdin'),
                    true
                ) ?: []
            )
        );
    }
}
