<?php

declare(strict_types=1);

namespace Router\Controller;

use Router\Component\Response;

/**
 * Class NotFoundController
 */
class NotFoundController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return new Response('Not Found', 404);
    }
}
