<?php

namespace App\Application\Middleware;


use App\Domain\Service\BootstrapInterface;
use App\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class BootstrapMiddleware
{


    /**
     * @var BootstrapInterface
     */
    private $bootstrap;
    /**
     * @var FlashMessageInterface
     */
    private $flash;

    public function __construct(BootstrapInterface $bootstrap, FlashMessageInterface $flash)
    {
        $this->bootstrap = $bootstrap;
        $this->flash = $flash;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $this->bootstrap->create();
        $request = $request->withAttribute('flash', $this->flash);
        return $next($request, $response);
    }
}
