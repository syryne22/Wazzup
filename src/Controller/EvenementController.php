<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Rencontre;
use App\Entity\SalleCinema;
use App\Entity\Utilisateurs;
use App\Form\EvenementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/evenement")
 */
class EvenementController extends AbstractController
{
    /**
     * @Route("/list/{user}", name="app_evenement_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager, Utilisateurs $user): Response
    {
        $evenements = $entityManager
            ->getRepository(Evenement::class)
            ->findby([
                'idUtilisateur'=> $user->getIdUtilisateur()
            ]);

        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }

    /**
     * @Route("/new", name="app_evenement_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($evenement);
            $entityManager->flush(); 
            if($evenement->getTypeEvent()=="Rencontre")
            return $this->redirectToRoute('app_rencontre_new', ['evenement'=>$evenement->getId(),'user'=>58], Response::HTTP_SEE_OTHER);
            return $this->redirectToRoute('app_salle_cinema_new', ['evenement'=>$evenement->getId(),'user'=>58
            //$this->getUser()->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evenement/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_evenement_show", methods={"GET"})
     */
    public function show(Evenement $evenement): Response
    {

        return $this->render('evenement/show.html.twig', [
            'evenement' => $evenement,

        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_evenement_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('evenement/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idEvent}", name="app_evenement_delete", methods={"POST"})
     */
    public function delete(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getIdEvent(), $request->request->get('_token'))) {
            $entityManager->remove($evenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
    }
}
