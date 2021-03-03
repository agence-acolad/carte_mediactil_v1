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
    public $cat;


    function __construct( CategorieRepository $repoC)
    {
        $this->cat      = $repoC->findAll();
    }


    // /**
    //  * @Route("/nav", name="nav")
    //  */
    // public function nav(OngletRepository $repoO)
    // {
    //     $onglets = $repoO->findAll();
    //     return $this->render('components/navbar.html.twig', [
    //         'onglets' => $onglets,
    //     ]);
    // }
    

    /**
     * @Route("/", name="accueil")
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
    public function indexEn(ProduitRepository $repoProduit, CategorieRepository $repoC)
    {
        $categories = $repoC->findAll();
        return $this->render('index.html_en.twig', [
            'produits' => $repoProduit->findAll(),
            'categories' => $categories,
           
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/admin", name="administration")
     */
    public function admin()
    {
        return $this->render('admin.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}