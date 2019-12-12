<?php

namespace App\Controller;

use App\CRUD\Blog\AuteurCRUD;
use App\Entity\Auteur;
use App\Form\Blog\AuteurFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
            'controller_name' => 'Auteur Controller'
        ]);
    }

    /**
     * @Route("/blog/auteur/showone/{idAuteur}", name="showOneAuteur")
     * @param AuteurCRUD $auteurCRUD
     * @param $idAuteur
     * @return Response
     */
    public function indexShowOneAuteurById(AuteurCRUD $auteurCRUD, $idAuteur)
    {
        /**
         * @var Auteur $auteur
         */
        $auteur = $auteurCRUD->getOneByIdAuteur($idAuteur);

        return $this->render('blog/auteur/auteurOne.html.twig', [
            'auteur' => $auteur
        ]);
    }

    /**
     * @Route("/blog/auteur/showall", name="showAllAuteur")
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     */
    public function indexShowAllAuteur(AuteurCRUD $auteurCRUD)
    {
        $auteurs = $auteurCRUD->getAllAuteur();

        return $this->render('blog/auteur/auteurAll.html.twig',
        [
            'auteurs'=>$auteurs
        ]);
    }

    /**
     * @Route("/blog/auteur/create_auteur", name="createAuteur")
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @return Response
     */
    public function indexCreateAuteur(Request $request, AuteurCRUD $auteurCRUD)
    {
        // create empty auteur
        $auteur = new Auteur();

        // create form
        $form =$this->createForm(AuteurFormType::class, $auteur);

        // Handle form = submit
        $form->handleRequest($request);

        //Treat submitted form
        if ($form->isSubmitted() && $form->isValid()){
            //persist
            $auteurCRUD->addAuteur($auteur);

            //redirect
            return $this->redirectToRoute('showAllAuteur');
        }
        //create and return template
        return $this->render('blog/auteur/createAuteur.html.twig',
            [
                'auteurForm' => $form->createView()
            ]);
    }

    /**
     * @Route("/blog/auteur/update_auteur/{idAuteur}", name="updateAuteur")
     * @param Request $request
     * @param AuteurCRUD $auteurCRUD
     * @param $idAuteur
     * @return Response
     */
    public function indexUpdateAuteur($idAuteur, Request $request, AuteurCRUD $auteurCRUD )
    {
        // Get auteur
        $auteur = $auteurCRUD->getOneByIdAuteur($idAuteur);
        // create form
        $form =$this->createForm(AuteurFormType::class, $auteur);

        // Handle form = submit
        $form->handleRequest($request);

        //Treat submitted form
        if ($form->isSubmitted() && $form->isValid()){
            //persist
            $auteurCRUD->updateAuteur($auteur);

            //redirect
            return $this->redirectToRoute('showAllAuteur', ['idAuteur'=>$idAuteur]);
        }
        //create and return template
        return $this->render('blog/auteur/updateAuteur.html.twig', [
            'auteurForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/blog/auteur/delete_auteur/{idAuteur}", name="deleteAuteur")
     * @param AuteurCRUD $auteurCRUD
     * @param $idAuteur
     * @return RedirectResponse
     */
    public function indexDeleteAuteur($idAuteur, AuteurCRUD $auteurCRUD)
    {
        //get auteur
        $auteur = $auteurCRUD->getOneByIdAuteur($idAuteur);

        //delete
        $auteurCRUD->deleteAuteur($auteur);

        //redirect
        return  $this->redirectToRoute('showAllAuteur');
    }


}
