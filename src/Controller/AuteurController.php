<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    /**
     * @Route("blog/auteur", name="blogAuteur")
     */
    public function indexAuteur()
    {
        return $this->render('blog/auteur/auteur.html.twig', [
            'controller_name' => 'Auteur Controller',
        ]);
    }

    /**
     * @Route("/blog/auteur/showone/{idAuteur}", name="showOneAuteur")
     * @param $idAuteur
     */
    public function indexShowOneAuteurById($idAuteur)
    {
        return $this->render('blog/auteur/auteurOne.html.twig', [
            'idAuteur' => $idAuteur
        ]);
    }

    /**
     * @Route("/blog/auteur/showall", name="showAllAuteur")
     */
    public function indexShowAllAuteur()
    {
        return $this->render('blog/auteur/auteurAll.html.twig');
    }

    /**
     * @Route("/blog/auteur/create_auteur", name="createAuteur")
     */
    public function indexCreateAuteur()
    {
        return $this->render('blog/auteur/createAuteur.html.twig');
    }

    /**
     * @Route("/blog/auteur/update_auteur/{idAuteur}", name="updateAuteur")
     * @param $idAuteur
     */
    public function indexUpdateAuteur($idAuteur)
    {
        return $this->render('blog/auteur/updateAuteur.html.twig', [
            'idAuteur' => $idAuteur
        ]);
    }

    /**
     * @Route("/blog/auteur/delete_auteur/{idAuteur}", name="deleteAuteur")
     * @param $idAuteur
     */
    public function indexDeleteAuteur($idAuteur)
    {
        return $this->render('blog/auteur/deleteAuteur.html.twig', [
            'idAuteur' => $idAuteur
        ]);
    }


}
