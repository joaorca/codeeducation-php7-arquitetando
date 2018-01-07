<?php


namespace App\Application\Action\Customer;


use App\Domain\Persistence\CustomerRepositoryInterface;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CustomerCreateFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $repository = $container->get(CustomerRepositoryInterface::class);
        $template = $container->has(TemplateRendererInterface::class)
            ? $container->get(TemplateRendererInterface::class)
            : null;
        return new CustomerCreateAction($repository, $template);
    }
}