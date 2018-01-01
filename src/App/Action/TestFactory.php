<?php


namespace App\Action;


use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class TestFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $template = ($container->has(TemplateRendererInterface::class))
                ? $container->get(TemplateRendererInterface::class)
                : null;

        return new TestAction($container->get(EntityManager::class), $template);
    }

}