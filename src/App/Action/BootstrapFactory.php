<?php

namespace App\Action;

use App\Infrastructure\Bootstrap;
use Interop\Container\ContainerInterface;

class BootstrapFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $bootstrap = new Bootstrap();
        return new BootstrapAction($bootstrap);
    }
}