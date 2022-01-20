<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\MusiqueRepository;


class MusiquesController extends AbstractController
{
    /**
     * @Route("/musiques", name="musiques")
     */
    public function index(Request $request,MusiqueRepository $musiqueRepository): Response
    {
        $currentPage = $request->getPathInfo();
        $musiques = $musiqueRepository->findBy([],['id'=>'DESC']);
        return $this->render('musiques/index.html.twig', [
            'currentPage' => $currentPage,
            'musiques' => $musiques,
        ]);
    }

}
