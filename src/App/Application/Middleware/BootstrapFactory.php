<?php

namespace App\Application\Middleware;

use App\Infrastructure\Bootstrap;
use Interop\Container\ContainerInterface;

class BootstrapFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $bootstrap = new Bootstrap();
        return new BootstrapMiddleware($bootstrap);
    }
}