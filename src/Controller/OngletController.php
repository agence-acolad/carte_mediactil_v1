<?php

namespace App\Controller;

use App\Entity\Onglet;
use App\Form\OngletType;
use App\Repository\CategorieRepository;
use App\Repository\OngletRepository;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/onglet")
 */
class OngletController extends AbstractController
{

    function translate($target, $string){
        $tr = new GoogleTranslate();
        $tr->setSource('fr');
        $tr->setTarget($target); 
        $motTraduit = $tr->translate($string);
        return $motTraduit;
    }
    
    /**
     * @Route("/", name="onglet_index", methods={"GET"})
     */
    public function index(OngletRepository $ongletRepository): Response
    {
        return $this->render('onglet/index.html.twig', [
            'onglets' => $ongletRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="onglet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $onglet = new Onglet();
        $form = $this->createForm(OngletType::class, $onglet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $nomFr = $onglet->getNom();
            $nomEN = $this->translate('en', $nomFr);
            $onglet->setNomEn($nomEN);
            $nomES = $this->translate('es', $nomFr);
            $onglet->setNomEs($nomES);
            $nomDE = $this->translate('de', $nomFr);
            $onglet->setNomDe($nomDE);
            $nomIT = $this->translate('it', $nomFr);
            $onglet->setNomIt($nomIT);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($onglet);
            $entityManager->flush();

            return $this->redirectToRoute('onglet_index');
        }

        return $this->render('onglet/new.html.twig', [
            'onglet' => $onglet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/onglet/{id}", name="onglet", methods={"GET"})
     */
    public function show(Onglet $ong, OngletRepository $repoO, CategorieRepository $repoC): Response
    {
        $onglets = $repoO->findAll();
        return $this->render('onglet.html.twig', [
            'ong' => $ong,
            'categories' =>  $repoC,
            'onglets' => $onglets
        ]);
    }

    /**
     * @Route("/{id}/edit", name="onglet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Onglet $onglet): Response
    {
        $form = $this->createForm(OngletType::class, $onglet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('onglet_index');
        }

        return $this->render('onglet/edit.html.twig', [
            'onglet' => $onglet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="onglet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Onglet $onglet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$onglet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($onglet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('onglet_index');
    }
}
