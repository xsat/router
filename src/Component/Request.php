<?php

declare(strict_types=1);

namespace Router\Component;

use InvalidArgumentException;

/**
 * Class Request
 */
class Request
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';
    public const OPTIONS = 'OPTIONS';

    private const ALLOWED_METHODS = [
        self::GET,
        self::POST,
        self::PUT,
        self::DELETE,
        self::OPTIONS
    ];

    /**
     * @var string
     */
    private string $method;

    /**
     * @var string
     */
    private string $path;

    /**
     * @var array
     */
    private array $data;

    /**
     * Request constructor.
     *
     * @param string $method
     * @param string $path
     * @param array $data
     *
     * @throws InvalidArgumentException then $method is invalid
     */
    public function __construct(
        string $method = self::GET,
        string $path = '',
        array $data = []
    ) {
        if (!in_array($method, self::ALLOWED_METHODS)) {
            throw new InvalidArgumentException("`$method` method is invalid");
        }

        $this->method = $method;
        $this->path = $path;
        $this->data = $data;
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
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
