<?php

namespace App\Controller;

use App\CRUD\Blog\ArticleCRUD;
use App\Entity\Article;
use App\Form\Blog\ArticleFormType;
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
     * @param ArticleCRUD $articleCRUD
     * @param $idArticle
     * @return Response
     */
    public function indexShowOneById(ArticleCRUD $articleCRUD, $idArticle)
    {
        /**
         * @var Article $article
         */
        $article = $articleCRUD->getOneByIdArticle($idArticle);

        return $this->render('blog/article/articleOne.html.twig',
            [
                'article' => $article
            ]);
    }

    /**
     * @Route("/blog/article/showall", name="showAllArticle")
     * @param ArticleCRUD $articleCRUD
     * @return Response
     */
    public function indexShowAll(ArticleCRUD $articleCRUD)
    {

        $articles = $articleCRUD->getAllArticle();

        return $this->render('blog/article/articleAll.html.twig',
            [
                'articles' => $articles
            ]);
    }

    /**
     * @Route("/blog/article/create_article", name="createArticle")
     * @param ArticleCRUD $articleCRUD
     * @param Request $request
     * @return Response
     */
    public function indexCreateArticle(Request $request, ArticleCRUD $articleCRUD)
    {
        // create empty article
        $article = new Article();
        $article->setDate(new \DateTime('now'));

        // create form
        $form = $this->createForm(ArticleFormType::class, $article);

        // Handle form = submit
        $form->handleRequest($request);

        //Treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {
            //persist
            $articleCRUD->addArticle($article);

            //redirect
            return $this->redirectToRoute('showAllArticle');
        }
        //create and return template
        return $this->render('blog/article/createArticle.html.twig',
            [
                'articleForm' => $form->createView()
            ]);
    }

    /**
     * @Route("/blog/article/update_article/{idArticle}", name="updateArticle")
     * @param $idArticle
     * @param Request $request
     * @param ArticleCRUD $articleCRUD
     * @return Response
     */
    function indexUpdateArticle($idArticle, Request $request, ArticleCRUD $articleCRUD)
    {
        // Get Article
        $article = $articleCRUD -> getOneByIdArticle($idArticle);
        // create form
        $form = $this->createForm(ArticleFormType::class, $article);

        // Handle form = submit
        $form->handleRequest($request);

        //Treat submitted form
        if ($form->isSubmitted() && $form->isValid()) {

            //persist
            $articleCRUD->updateArticle($article);

            //redirect
            return $this->redirectToRoute('showAllArticle', ['idArticle'=>$idArticle]);
        }
        //create and return template
        return $this->render('blog/article/updateArticle.html.twig', [
            'articleForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/blog/article/delete_article/{idArticle}", name="deleteArticle")
     * @param ArticleCRUD $articleCRUD
     * @param $idArticle
     * @return Response
     */
    function IndexDeleteArticle($idArticle, ArticleCRUD $articleCRUD)
    {
        //get article
        $article = $articleCRUD->getOneByIdArticle($idArticle);

        //delete
        $articleCRUD->deleteArticle($article);

        //redirect
        return  $this->redirectToRoute('showAllArticle');
    }


}


