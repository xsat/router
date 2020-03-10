<?php

declare(strict_types=1);

namespace Router\Controller;

use Router\Component\JsonResponse;
use Router\Component\Response;

/**
 * Class IndexController
 */
class IndexController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        return new JsonResponse(
            $this->request->getData()
        );
    }

    /**
     * @return Response
     */
    public function test(): Response
    {
        return new JsonResponse(
            $this->request->getData()
        );
    }
}
