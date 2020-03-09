<?php

declare(strict_types=1);

namespace Router\Controller;

use Router\Component\Request;

/**
 * Class AbstractController
 */
abstract class AbstractController
{
    /**
     * @var Request
     */
    protected Request $request;

    /**
     * AbstractController constructor.
     *
     * @param Request $request
     */
    final public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
