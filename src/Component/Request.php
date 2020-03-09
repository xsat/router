<?php

declare(strict_types=1);

namespace Router\Component;

/**
 * Class Request
 */
class Request
{
    public const GET = 'GET';
    public const POST = 'POST';
    public const PUT = 'PUT';
    public const DELETE = 'DELETE';

    /**
     * @var array
     */
    private array $params;

    /**
     * @var array
     */
    private array $data;

    /**
     * Request constructor.
     *
     * @param array $params
     * @param array $data
     */
    public function __construct(array $params = [], array $data = [])
    {
        $this->params = $params;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}
