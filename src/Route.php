<?php

declare(strict_types=1);

namespace Router;

/**
 * Class Route
 */
class Route
{
    /**
     * @var string
     */
    private string $method;

    /**
     * @var string
     */
    private string $path;

    /**
     * @var string
     */
    private string $action;

    /**
     * Route constructor.
     *
     * @param string $method
     * @param string $path
     * @param string $action
     */
    public function __construct(
        string $method,
        string $path,
        string $action
    ) {
        $this->method = $method;
        $this->path = $path;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }
}
