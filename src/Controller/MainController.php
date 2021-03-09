<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Repository\CategorieRepository;
use App\Repository\OngletRepository;
use App\Repository\ProduitRepository;
use Doctrine\DBAL\Tools\Dumper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class MainController extends AbstractController
{

    /**
     * @Route("/", name="Bienvenue")
     */
    public function index( ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        $categories = $repoC->findAll();
        return $this->render('index.html.twig', [
            'produits' => $repoProduit->findAll(),
            'categories' => $categories,
            'onglets' => $onglets,
        ]);
    }

     /**
     * @Route("/en", name="Welcome")
     */
    public function indexEn(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        $categories = $repoC->findAll();
        return $this->render('index.html_en.twig', [
            'produits' => $repoProduit->findAll(),
            'categories' => $categories,
            'onglets' => $onglets,
        ]);
    }

    /**
     * @Route("/ru", name="Добро пожаловать")
     */
    public function indexRu(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        $categories = $repoC->findAll();
        return $this->render('index.html_ru.twig', [
            'produits' => $repoProduit->findAll(),
            'categories' => $categories,
            'onglets' => $onglets,
        ]);
    }

    /**
    * @Route("/de", name="Willkommen")
    */
    public function indexDe(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       $categories = $repoC->findAll();
       return $this->render('index.html_de.twig', [
           'produits' => $repoProduit->findAll(),
           'categories' => $categories,
           'onglets' => $onglets,
       ]);
    }

    /**
    * @Route("/it", name="Benvenuto")
    */
    public function indexIt(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       $categories = $repoC->findAll();
       return $this->render('index.html_it.twig', [
           'produits' => $repoProduit->findAll(),
           'categories' => $categories,
           'onglets' => $onglets,
       ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/admin", name="administration")
     */
    public function admin(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        $categories = $repoC->findAll();
        return $this->render('admin.html.twig', [
            'controller_name' => 'MainController',
            'produits' => $repoProduit->findAll(),
            'categories' => $categories,
            'onglets' => $onglets,
        ]);
    }
}