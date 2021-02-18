<?php

namespace App\Controller;

use App\Entity\Onglet;
use App\Form\OngletType;
use App\Repository\OngletRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/onglet")
 */
class OngletController extends AbstractController
{
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
     * @Route("/{id}", name="onglet_show", methods={"GET"})
     */
    public function show(Onglet $onglet): Response
    {
        return $this->render('onglet/show.html.twig', [
            'onglet' => $onglet,
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
