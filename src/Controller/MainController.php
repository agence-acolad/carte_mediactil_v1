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


    function __construct( CategorieRepository $repoC)
    {
        $this->cat = $repoC->findAll();
    }
    
    /**
     * @Route("/", name="Bienvenue")
     */
    public function index( ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        return $this->render('index.html.twig', [
            'catNext' => $repoC->findAll(),
            'produits' => $repoProduit->findAll(),
            'catSuggestion' => $repoC->findOneBy(['nom' => 'Suggestions']),
            'catStarter' => $repoC->findOneBy(['nom' => 'Entrées / Salade Repas']),
            'onglets' => $onglets,
            ]);
    }

     /**
     * @Route("/en", name="Welcome")
     */
    public function indexEn(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        return $this->render('index.html_en.twig', [
            'catNext' => $repoC->findAll(),
            'produits' => $repoProduit->findAll(),
            'catSuggestion' => $repoC->findOneBy(['nom' => 'Suggestions']),
            'catStarter' => $repoC->findOneBy(['nom' => 'Entrées / Salade Repas']),
            'onglets' => $onglets,
        ]);
    }

    /**
     * @Route("/ru", name="Добро пожаловать")
     */
    public function indexRu(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        return $this->render('index.html_ru.twig', [
            'catNext' => $repoC->findAll(),
            'produits' => $repoProduit->findAll(),
            'catSuggestion' => $repoC->findOneBy(['nom' => 'Suggestions']),
            'catStarter' => $repoC->findOneBy(['nom' => 'Entrées / Salade Repas']),
            'onglets' => $onglets,
        ]);
    }

    /**
    * @Route("/de", name="Willkommen")
    */
    public function indexDe(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       return $this->render('index.html_de.twig', [
        'catNext' => $repoC->findAll(),
        'produits' => $repoProduit->findAll(),
        'catSuggestion' => $repoC->findOneBy(['nom' => 'Suggestions']),
        'catStarter' => $repoC->findOneBy(['nom' => 'Entrées / Salade Repas']),
        'onglets' => $onglets,
   ]);
    }

    /**
    * @Route("/it", name="Benvenuto")
    */
    public function indexIt(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       return $this->render('index.html_it.twig', [
        'catNext' => $repoC->findAll(),
        'produits' => $repoProduit->findAll(),
        'catSuggestion' => $repoC->findOneBy(['nom' => 'Suggestions']),
        'catStarter' => $repoC->findOneBy(['nom' => 'Entrées / Salade Repas']),
        'onglets' => $onglets,
       ]);
    }

    /**
     * @Route("/adminlecosmo", name="administration")
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

    /**
     * @Route("/suggestions", name="suggestions")
     */
    public function suggestions(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        return $this->render('suggestions.html.twig', [
            'catNext' => $repoC->findAll(),
            'produits' => $repoProduit->findAll(),
            'catSuggestion' => $repoC->findOneBy(['nom' => 'Suggestions']),
            'catStarter' => $repoC->findOneBy(['nom' => 'Entrées / Salade Repas']),
            'onglets' => $onglets,
        ]);
    }

     /**
     * @Route("/portefolio", name="portefolio")
     */
    public function portefolio(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
        $onglets = $repoO->findAll();
        $categories = $repoC->findAll();
        return $this->render('portefolio.html.twig', [
            'produits' => $repoProduit->findAll(),
            'categories' => $categories,
            'onglets' => $onglets,
        ]);
    }

    /**
    * @Route("/menu", name="menu")
    */
    public function menu(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       return $this->render('menu/menu.html.twig', [
        'catNext' => $repoC->findAll(),
        'produits' => $repoProduit->findAll(),
        'catMenus' => $repoC->findOneBy(['nom' => 'Menus']),
        'MenuEnt' => $repoC->findOneBy(['nom' => 'Menu - Entrées']),
        'MenuPlat' => $repoC->findOneBy(['nom' => 'Menu - Plats']),
        'MenuDess' => $repoC->findOneBy(['nom' => 'Menu - Desserts']),
        'onglets' => $onglets,
       ]);
    }

    /**
    * @Route("/menuEn", name="menuEn")
    */
    public function menuEn(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       return $this->render('menu/menu.html_en.twig', [
        'catNext' => $repoC->findAll(),
        'produits' => $repoProduit->findAll(),
        'catMenus' => $repoC->findOneBy(['nom' => 'Menus']),
        'MenuEnt' => $repoC->findOneBy(['nom' => 'Menu - Entrées']),
        'MenuPlat' => $repoC->findOneBy(['nom' => 'Menu - Plats']),
        'MenuDess' => $repoC->findOneBy(['nom' => 'Menu - Desserts']),
        'onglets' => $onglets,
       ]);
    }

    /**
    * @Route("/menuDe", name="menuDe")
    */
    public function menuDe(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       return $this->render('menu/menu.html_de.twig', [
        'catNext' => $repoC->findAll(),
        'produits' => $repoProduit->findAll(),
        'catMenus' => $repoC->findOneBy(['nom' => 'Menus']),
        'MenuEnt' => $repoC->findOneBy(['nom' => 'Menu - Entrées']),
        'MenuPlat' => $repoC->findOneBy(['nom' => 'Menu - Plats']),
        'MenuDess' => $repoC->findOneBy(['nom' => 'Menu - Desserts']),
        'onglets' => $onglets,
       ]);
    }

    /**
    * @Route("/menuIt", name="menuIt")
    */
    public function menuIt(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       return $this->render('menu/menu.html_it.twig', [
        'catNext' => $repoC->findAll(),
        'produits' => $repoProduit->findAll(),
        'catMenus' => $repoC->findOneBy(['nom' => 'Menus']),
        'MenuEnt' => $repoC->findOneBy(['nom' => 'Menu - Entrées']),
        'MenuPlat' => $repoC->findOneBy(['nom' => 'Menu - Plats']),
        'MenuDess' => $repoC->findOneBy(['nom' => 'Menu - Desserts']),
        'onglets' => $onglets,
       ]);
    }

    /**
    * @Route("/menuRu", name="menuRu")
    */
    public function menuRu(ProduitRepository $repoProduit, CategorieRepository $repoC, OngletRepository $repoO)
    {
       $onglets = $repoO->findAll();
       return $this->render('menu/menu.html_ru.twig', [
        'catNext' => $repoC->findAll(),
        'produits' => $repoProduit->findAll(),
        'catMenus' => $repoC->findOneBy(['nom' => 'Menus']),
        'MenuEnt' => $repoC->findOneBy(['nom' => 'Menu - Entrées']),
        'MenuPlat' => $repoC->findOneBy(['nom' => 'Menu - Plats']),
        'MenuDess' => $repoC->findOneBy(['nom' => 'Menu - Desserts']),
        'onglets' => $onglets,
       ]);
    }

    /**
    * @Route("/aide", name="help")
    */
   public function help()
   {
       return $this->render('aide.html.twig', [
       ]);
   }
}