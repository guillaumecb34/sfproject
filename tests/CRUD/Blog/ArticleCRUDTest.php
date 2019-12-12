<?php

namespace App\Tests\CRUD\Blog;

use App\CRUD\Blog\ArticleCRUD;
use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

Class ArticleCRUDTest extends WebTestCase
{
    /**
     * @var ArticleCRUD
     */
    private $articleCRUD;

    /**
     * @var AuteurCRUD
     */
    private $auteurCRUD;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;

        $this->articleCRUD=$container ->get(ArticleCRUD::class);

        $this->auteurCRUD=$container ->get(AuteurCRUD::class);
    }

    /**
     * @test
     */
    public function testAddArticleSuccessful()
    {
        $auteurs = $this->auteurCRUD->getAllAuteur();
        $auteur = $auteurs [0];

        $article = new Article();
        $article ->setTitle("test title");
        $article ->setContent("test content");
        $article ->setDate(new \DateTime('now'));
        $article ->setAuteur($auteur);

        $this->articleCRUD->addArticle($article);

        $articleFromDb = $this->articleCRUD->getOneByIdArticle($article->getIdArticle());

        $this->assertEquals($article->getTitle(),$articleFromDb->getTitle());
        $this->assertEquals($article->getContent(),$articleFromDb->getContent());
        $this->assertEquals($article->getDate(),$articleFromDb->getDate());
        $this->assertEquals($article->getAuteur(),$articleFromDb->getAuteur());

    }
}