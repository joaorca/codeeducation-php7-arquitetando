<?php


namespace App\Application\Action\Customer\Factory;


use App\Application\Action\Customer\CustomerUpdateAction;
use App\Domain\Persistence\CustomerRepositoryInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CustomerUpdateFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $repository = $container->get(CustomerRepositoryInterface::class);
        $template = $container->get(TemplateRendererInterface::class);
        $router = $container->get(RouterInterface::class);
        return new CustomerUpdateAction($repository, $template, $router);
    }
}