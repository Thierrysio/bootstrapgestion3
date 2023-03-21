<?php

namespace App\Controller;
use App\Form\CoursesType;
use App\Entity\Courses;
use App\Repository\CoursesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursesController extends AbstractController
{
    #[Route('/courses', name: 'app_courses')]
    public function index(): Response
    {
        return $this->render('courses/index.html.twig', [
            'controller_name' => 'CoursesController',
        ]);
    }

    #[Route("/courses/nouveau", name:"coursesnouveau")]
      #[Route("/courses/{id}/edit", name:"coursesmaj")]
     
    public function Gestioncourses(Courses $uneCourse = null,
    Request $request, 
    EntityManagerInterface $manager)
    {
        
        if(!$uneCourse)
        {$uneCourse = new Courses();}
        

        $form = $this->createForm(coursesType::class,$uneCourse);
 
        $form->handleRequest($request);
 
        if(($form->isSubmitted() && $form->isValid()))
        {
            
            
            $manager->persist($uneCourse);
            
            $manager->flush();
 
            return $this->redirectToRoute('retour');
        }
 
        return $this->render('courses/Gestioncourses.html.twig', [
            'form' => $form->createView(),
            'editmode' => $uneCourse->getId() !== null
        ]);
    }

    #[Route('/courses/getgagnant', name: 'getgagnant')]

    public function getGagnant(CoursesRepository $coursesRepository)
    {
        $legagnant = $coursesRepository->findCourseChevalResultat();
    
        dd($legagnant);
        return new JsonResponse($legagnant);
    }
    
}
