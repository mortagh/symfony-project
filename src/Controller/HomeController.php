<?php

namespace App\Controller;
use App\Entity\Album;
use App\Entity\Artiste;
use App\Repository\AlbumRepository;
use App\Repository\ArtisteRepository;
use App\Repository\MusiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(Request $request): Response
    {
        return $this->redirectToRoute('home');
    }
    /**
     * @Route("/home", name="home")
     */
    public function home(Request $request,AlbumRepository $albumRepository,ArtisteRepository $artisteRepository,MusiqueRepository $musiqueRepository): Response
    {
        $albums = $albumRepository->findBy([],['id'=>'DESC']);
        $artistes = $artisteRepository->findBy([],['id'=>'DESC']);
        $musiques = $musiqueRepository->findBy([],['id'=>'DESC']);
        $currentPage = $request->getPathInfo();
        return $this->render('home/index.html.twig', [
            'currentPage' => $currentPage,
            'albums' => $albums,
            'artistes' => $artistes,
            'musiques' => $musiques,
        ]);
    }
}


