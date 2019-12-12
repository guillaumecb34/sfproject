<?php


namespace App\CRUD\Blog;


use App\Entity\Auteur;
use Doctrine\ORM\EntityManagerInterface;

class AuteurCRUD
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var \App\Repository\Blog\AuteurRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private $repo;

    public function __construct(EntityManagerInterface $em)
    {

        $this->em = $em;
        $this->repo = $em->getRepository('App:Auteur');
    }

    private function persist(Auteur $auteur): void
    {
        $this->em->persist($auteur);
        $this->em->flush();

    }

    public function addAuteur(Auteur $auteur): void
    {
        $this->persist($auteur);
    }

    public function updateAuteur(Auteur $auteur): void
    {
        $this->persist($auteur);
    }

    public function getOneByIdAuteur(int $idAuteur): Auteur
    {
       return $this->repo->find($idAuteur);
    }

    public function getAllAuteur(): array
    {
        return $this->repo->findAll();
    }

    public function deleteAuteur(Auteur $auteur): void
    {
        $this->em->remove($auteur);
        $this->em->flush();
    }

}