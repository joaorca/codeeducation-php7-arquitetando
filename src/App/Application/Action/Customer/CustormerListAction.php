<?php

namespace App\Application\Action\Customer;

use App\Domain\Persistence\CustomerRepositoryInterface as Repository;
use App\Domain\Service\FlashMessageInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface as Template;

class CustormerListAction
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var Template
     */
    private $template;

    public function __construct(Repository $repository, Template $template)
    {
        $this->repository = $repository;
        $this->template = $template;
    }

    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $customerList = $this->repository->findAll();
        /** @var FlashMessageInterface $flash */
        $flash = $request->getAttribute("flash");
        return new HtmlResponse($this->template->render("app::customer/list",
            ['customerList' => $customerList, 'message' => $flash->getMessage('success')]));
    }

}