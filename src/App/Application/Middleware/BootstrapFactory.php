<?php

namespace App\Application\Middleware;

use App\Domain\Service\FlashMessageInterface;
use App\Infrastructure\Bootstrap;
use App\Infrastructure\Service\FlashMessage;
use Interop\Container\ContainerInterface;

class BootstrapFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $bootstrap = new Bootstrap();
        $flash = $container->get(FlashMessageInterface::class);
        return new BootstrapMiddleware($bootstrap, $flash);
    }
}