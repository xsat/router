<?php

declare(strict_types=1);

namespace Router\Component;

/**
 * Class JsonResponse
 */
class JsonResponse extends Response
{
    /**
     * JsonResponse constructor.
     *
     * @param mixed $data
     * @param int $code
     * @param array $headers
     */
    public function __construct(
        $data = null,
        int $code = 200,
        array $headers = []
    ) {
        parent::__construct(
            json_encode($data) ?: null,
            $code,
            [
                'Content-Type' => 'application/json',
            ] + $headers
        );
    }
}
