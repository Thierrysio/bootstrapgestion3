<?php

namespace App\Controller;

use App\Entity\Chevaux;
use App\Form\ChevauxType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChevauxController extends AbstractController
{
    #[Route('/chevaux', name: 'app_chevaux')]
    public function index(): Response
    {
        return $this->render('chevaux/index.html.twig', [
            'controller_name' => 'ChevauxController',
        ]);
    }

    #[Route("/chevaux/nouveau", name:"chevauxnouveau")]
      #[Route("/chevaux/{id}/edit", name:"chevauxmaj")]
     
    public function GestionChevaux(Chevaux $unCheval = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$unCheval)
        {$unCheval = new Chevaux();}
        

        $form = $this->createForm(ChevauxType::class,$unCheval);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            $unCheval->setPrixRevente(12000);
            $manager->persist($unCheval);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('chevaux/GestionChevaux.html.twig', [
            'form' => $form->createView(),
            'editmode' => $unCheval->getId() !== null
        ]);
    }
}
