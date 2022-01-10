<?php

namespace App\Controller\Admin;

use App\Entity\Album;
use App\Entity\Article;
use App\Entity\Artiste;
use App\Entity\Musique;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Album', 'fas fa-list', Album::class);
        yield MenuItem::linkToCrud('Article', 'fas fa-list', Article::class);
        yield MenuItem::linkToCrud('Artiste', 'fas fa-list', Artiste::class);
        yield MenuItem::linkToCrud('Musique', 'fas fa-list', Musique::class);
        yield MenuItem::linkToCrud('Blog', 'fas fa-list', Article::class);

    }
}
