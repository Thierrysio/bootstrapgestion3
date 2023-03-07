<?php

namespace App\Controller;

use App\Entity\ChevauxCourses;
use App\Form\ChevauxCoursesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChevauxCoursesController extends AbstractController
{
    #[Route('/chevaux/courses', name: 'app_chevaux_courses')]
    public function index(): Response
    {
        return $this->render('chevaux_courses/index.html.twig', [
            'controller_name' => 'ChevauxCoursesController',
        ]);
    }
    #[Route("/chevauxCourses/nouveau", name:"chevauxCoursesnouveau")]
      #[Route("/chevauxCourses/{id}/edit", name:"chevauxCoursesmaj")]
     
    public function GestionchevauxCourses(ChevauxCourses $unechevauxCourses = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$unechevauxCourses)
        {$unechevauxCourses = new ChevauxCourses();}
        

        $form = $this->createForm(ChevauxCoursesType::class,$unechevauxCourses);
 
        $form->handleRequest($request);
 dd($request);
        if(($form->isSubmitted() && $form->isValid()))
        {
            $unechevauxCourses->setResultat(0);
            
            $manager->persist($unechevauxCourses);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('chevaux_courses/Gestionchevauxcourses.html.twig', [
            'form' => $form->createView(),
            'editmode' => $unechevauxCourses->getId() !== null,
            'toto' => 'dddddd'
        ]);
    }
}
