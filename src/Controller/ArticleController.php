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
     * @Route("/blog/article", name="blogArticle")
     */
    public function indexArticle()
    {
        return $this->render('blog/article/article.html.twig', [
            'controller_name' => 'Article Controller',
        ]);
    }

    /**
     * @Route("/blog/article/showone/{idArticle}", name="showOneArticle")
     * @param $idArticle
     */
    public function indexShowOneById($idArticle)
    {
        return $this->render('blog/article/articleOne.html.twig', [
            'idArticle' => $idArticle
        ]);
    }

    /**
     * @Route("/blog/article/showall", name="showAllArticle")
     */
    public function indexShowAll()
    {
        return $this->render('blog/article/articleAll.html.twig');
    }

    /**
     * @Route("/blog/article/create_article", name="createArticle")
     */
    public function indexCreateArticle()
    {
        return $this->render('blog/article/createArticle.html.twig');
    }

    /**
     * @Route("/blog/article/update_article/{idArticle}", name="updateArticle")
     * @param $idArticle
     */
    function indexUpdateArticle($idArticle)
    {
        return $this->render('blog/article/updateArticle.html.twig', [
            'idArticle' => $idArticle
        ]);
    }

    /**
     * @Route("/blog/article/delete_article/{idArticle}", name="deleteArticle")
     * @param $idArticle
     */
    function IndexDeleteArticle($idArticle)
    {
        return $this->render('blog/article/deleteArticle.html.twig', [
            'idArticle' => $idArticle
        ]);
    }



}


