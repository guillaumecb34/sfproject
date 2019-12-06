<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    /**
     * @Route("blog/auteur", name="auteur")
     */
    public function index()
    {
        return $this->render('auteur/auteur.html.twig', [
            'controller_name' => 'AuteurController',
        ]);
    }

    /**
     * @Route("/blog/auteur/showone/{idAuteur}", name="showOneAuteur")
     * @param $idAuteur
     * @param Request $request
     * @return Response
     */
    function showOneAuteurById($idAuteur, Request $request)
    {
        $response = new Response();

        $content = "<html><body>nous sommes dans 1 auteur</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/blog/auteur/showall", name="showAllAuteur")
     * @param Request $request
     * @return Response
     */
    function showAllAuteur(Request $request)
    {
        $response = new Response();

        $content = "<html><body>nous sommes dans tout les auteurs</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/blog/auteur/create_auteur", name="createAuteur")
     * @param Request $request
     * @return Response
     */
    function createAuteur(Request $request)
    {
        $response = new Response();

        $content = "<html><body>Page de creation d'auteur</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/blog/auteur/update_auteur/{idAuteur}", name="updateAuteur")
     * @param Request $request
     * @param $idAuteur
     * @return Response
     */
    function updateAuteur($idAuteur, Request $request)
    {
        $response = new Response();

        $content = "<html><body>ici tu update auteur</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }

    /**
     * @Route("/blog/auteur/delete_auteur/{idAuteur}", name="deleteAuteur")
     * @param Request $request
     * @param $idAuteur
     * @return Response
     */
    function deleteAuteur($idAuteur, Request $request)
    {
        $response = new Response();

        $content = "<html><body>ici tu delete auteur</body></html>";
        $response->setContent($content);
        $response->setStatusCode(200);

        return $response;
    }


}
