<?php


namespace App\Application\Action;


use App\Domain\Entity\Category;
use App\Domain\Entity\Customer;
use App\Domain\Persistence\CustomerRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class TesteAction
{

    /**
     * @var TemplateRendererInterface
     */
    private $template;
    /**
     * @var CustomerRepositoryInterface
     */
    private $repository;

    public function __construct(CustomerRepositoryInterface $repository, TemplateRendererInterface $template = null)
    {
        $this->template = $template;
        $this->repository = $repository;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {

        /*
        $customer = new Customer();
        $customer->setName('João Roberto')
            ->setEmail('joaorca@gmail.com');
        $this->repository->create($customer);
        */

        $customerList = $this->repository->findAll();
        var_dump($customerList);

        return new HtmlResponse("Teste Action");
    }

}