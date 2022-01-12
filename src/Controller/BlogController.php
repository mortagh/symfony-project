<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(Request $request, ArticleRepository $articleRepository): Response
    {
        $currentPage = $request->getPathInfo();
        $articles = $articleRepository->findBy([],['id'=>'DESC']);
        return $this->render('blog/index.html.twig', [
            'currentPage' => $currentPage,
            'articles' => $articles,
        ]);
    }
    /**
     * @Route("/blog/{id}", name="view_article")
     */
    public function viewArticle($id): Response
    {
        return $this->render('blog/view.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
