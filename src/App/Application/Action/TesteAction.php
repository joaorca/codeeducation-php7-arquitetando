<?php


namespace App\Application\Action;


use App\Domain\Entity\Category;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class TesteAction
{

    /**
     * @var EntityManager
     */
    private $manager;
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    public function __construct(EntityManager $manager, TemplateRendererInterface $template = null)
    {
        $this->manager = $manager;
        $this->template = $template;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        return new HtmlResponse("Teste Action");
    }

}