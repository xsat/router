<?php

declare(strict_types=1);

namespace Router;

/**
 * Class Match
 */
class Match
{
    /**
     * @var string|null
     */
    private ?string $controller;

    /**
     * @var string|null
     */
    private ?string $method;

    /**
     * Match constructor.
     *
     * @param string|null $controller
     * @param string|null $method
     */
    public function __construct(
        ?string $controller,
        ?string $method
    ) {
        $this->controller = $controller;
        $this->method = $method;
    }

    /**
     * @return string|null
     */
    public function getController(): ?string
    {
        return $this->controller;
    }

    /**
     * @return string|null
     */
    public function getMethod(): ?string
    {
        return $this->method;
    }
}
