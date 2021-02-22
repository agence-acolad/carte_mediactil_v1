<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Repository\CategorieRepository;
use App\Repository\OngletRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ProduitRepository $repoProduit, CategorieRepository $repoCategorie, Categorie $cat)
    {
        return $this->render('index.html.twig', [
            'produits' => $repoProduit->findAll(),
            'categories' => $repoCategorie->findAll(),
            'cat' => $cat
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

    /**
     * @Route("/test", name="categories")
     */
    public function indexCat(ProduitRepository $repoP, CategorieRepository $repoC)
    {
        $categories= $repoC->findBy(['produits' => '']);
        return $this->render('test.html.twig', [
            'produits' => $repoP->findBy(['categories' => $this->$categories]),
            'categories' => $categories
        ]);
    }

}