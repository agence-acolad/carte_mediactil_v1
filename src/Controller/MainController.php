<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/admin", name="administration")
     */
    public function admin()
    {
        return $this->render('admin.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}