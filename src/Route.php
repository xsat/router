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
    private string $action;

    /**
     * @var string
     */
    private string $path;

    /**
     * @var string|null
     */
    private ?string $method;

    /**
     * Route constructor.
     *
     * @param string $action
     * @param string $path
     * @param string|null $method
     */
    public function __construct(
        string $action,
        string $path = '/',
        ?string $method = null
    ) {
        $this->action = $action;
        $this->path = $path;
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }
}
