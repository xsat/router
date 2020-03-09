<?php

declare(strict_types=1);

namespace Router;

use InvalidArgumentException;

/**
 * Class Response
 */
class Response
{
    private const AVAILABLE_CODES = [
        100, 101, 102, 103,
        200, 201, 202, 203, 204, 205, 206, 207, 208, 226,
        300, 301, 302, 303, 304, 305, 306, 307, 308,
        400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413,
        414, 415, 416, 417, 418, 421, 422, 423, 424, 425, 426, 428, 429, 431, 451,
        500, 501, 502, 503, 504, 505, 506, 507,508, 510, 511,
    ];

    /**
     * @var string|null
     */
    private ?string $body;
    /**
     * @var int
     */
    private int $code;
    /**
     * @var array
     */
    private array $headers;

    /**
     * Response constructor.
     *
     * @param string|null $body
     * @param int $code
     * @param array $headers
     *
     * @throws InvalidArgumentException then $code is invalid
     */
    public function __construct(
        ?string $body = null,
        int $code = 200,
        array $headers = []
    ) {
        $this->body = $body;

        if (!in_array($code, self::AVAILABLE_CODES)) {
            throw new InvalidArgumentException("`$code` code is invalid");
        }

        $this->code = $code;
        $this->headers = $headers;
    }

    public function send(): void
    {
        if (!headers_sent()) {
            foreach ($this->headers as $name => $value) {
                header("$name:$value");
            }
        }

        http_response_code($this->code);

        if ($this->body !== null) {
            echo $this->body;
        }
    }
}
