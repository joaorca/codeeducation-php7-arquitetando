<?php


namespace App\Infrastructure\Persistence\Doctrine\Repository;


use App\Domain\Entity\Customer;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class CustomerRepositoryFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Customer::class);
    }
}