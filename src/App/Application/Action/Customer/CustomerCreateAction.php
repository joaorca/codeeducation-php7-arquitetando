<?php


namespace App\Application\Action\Customer;


use App\Domain\Entity\Customer;
use App\Domain\Persistence\CustomerRepositoryInterface;
use App\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class CustomerCreateAction
{

    /**
     * @var CustomerRepositoryInterface
     */
    private $repository;
    /**
     * @var TemplateRendererInterface
     */
    private $template;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(
        CustomerRepositoryInterface $repository,
        TemplateRendererInterface $template,
        RouterInterface $router
    ) {
        $this->repository = $repository;
        $this->template = $template;
        $this->router = $router;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        if ($request->getMethod() == 'POST') {
            $data = $request->getParsedBody();
            $entity = new Customer();
            $entity->setName($data["name"])->setEmail($data["email"]);
            $this->repository->create($entity);

            /** @var FlashMessageInterface $flash */
            $flash = $request->getAttribute("flash");
            $flash->setMessage("success", "Contato cadastrado com sucesso");

            $uri = $this->router->generateUri("customer.list");

            return new RedirectResponse($uri);
        }

        return new HtmlResponse($this->template->render("app::customer/create"));
    }
}