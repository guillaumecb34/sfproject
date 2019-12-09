<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Article
 * @ORM\Entity(repositoryClass="App\Repository\Blog\ArticleRepository")
 * @ORM\Table(name"article")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="idArticle", type="integer", nullable=false)
     * @var integer
     */
     private $idArticle;

    /**
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     * @var string
     */
     private $title;

    /**
     * @ORM\Column(name="content", type="text", nullable=false)
     * @var string
     */
     private $content;

    /**
     * ORM\Column (name"date", type"datetime", nullable=false)
     * @var \DateTime
     */
     private $date;

}