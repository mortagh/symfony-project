<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
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
