<?php


namespace App\CRUD\Blog;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;

class ArticleCRUD
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var \App\Repository\Blog\ArticleRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private $repo;

    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;
        $this->repo = $em->getRepository('App:Article');
    }

    private function persist(Article $article): void
    {
        $this->em->persist($article);
        $this->em->flush();

    }

    public function addArticle(Article $article): void
    {
        $this->persist($article);
    }

    public function updateArticle(Article $article): void
    {
        $this->persist($article);
    }

    public function getOneByIdArticle(int $idArticle): Article
    {
       return $this->repo->find($idArticle);
    }

    public function getAllArticle(): array
    {
        return $this->repo->findAll();
    }

    public function deleteArticle(Article $article): void
    {
        $this->em->remove($article);
        $this->em->flush();
    }

}