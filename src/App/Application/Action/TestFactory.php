<?php


namespace App\Application\Action;


use App\Application\Action\TesteAction;
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

        return new TesteAction($container->get(EntityManager::class), $template);
    }

}