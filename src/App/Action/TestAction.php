<?php


namespace App\Action;


use App\Entity\Category;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class TestAction
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
        /*
        $category = new Category();
        $category->setName("Categoria 001");
        $this->manager->persist($category);
        $this->manager->flush();
        */

        $categories = $this->manager->getRepository(Category::class)->findAll();


        return new HtmlResponse("Teste Action");
    }

}