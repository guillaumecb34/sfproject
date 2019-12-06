<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Article
 * @package App\Controller
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/blog/article", name="blog_article")
     */
    public function index()
    {
        return $this->render('article/article.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    /**
     * @Route("/blog/article/showone/{idArticle}", name="showOneArticle")
     * @param $idArticle
     * @param Request $request
     * @return Response
     */
    function showOneById($idArticle, Request $request)
    {
        $response = new Response();

        $content = "<html><body>nous sommes dans 1 article</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/blog/article/showall", name="showAllArticle")
     * @param Request $request
     * @return Response
     */
    function showAll(Request $request)
    {
        $response = new Response();

        $content = "<html><body>nous sommes dans tout les articles</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/blog/article/create_article", name="createArticle")
     * @param Request $request
     * @return Response
     */
    function createArticle(Request $request)
    {
        $response = new Response();

        $content = "<html><body>Page de creation d'article</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/blog/article/update_article/{idArticle}", name="updateArticle")
     * @param Request $request
     * @param $idArticle
     * @return Response
     */
    function updateArticle($idArticle, Request $request)
    {
        $response = new Response();

        $content = "<html><body>ici tu update un article</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/blog/article/delete_article/{idArticle}", name="deleteArticle")
     * @param Request $request
     * @param $idArticle
     * @return Response
     */
    function deleteArticle($idArticle, Request $request)
    {
        $response = new Response();

        $content = "<html><body>ici tu delete un article</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }



}


