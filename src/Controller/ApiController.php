<?php

namespace App\Controller;
use App\Entity\Proprietaires;
use App\Repository\ProprietairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

   #[Route('/api/apivue', name: 'apivue')]

public function getEntitiesAction(ProprietairesRepository $proprietairesRepository)
{
    $lespropritaires = $proprietairesRepository->findAll();

    $data = [];
    foreach ($lespropritaires as $lepropritaire) {
        $data[] = [
            'id' => $lepropritaire->getId(),
            'nomproprietaire' => $lepropritaire->getNomProprietaire(),
            // Ajoutez ici les autres champs de votre entité
        ];
    }
dd($data);
    return new JsonResponse($data);
}


#[Route('/api/helloword/{name}', name: 'api_helloword')]
    
    public function apiHelloword(string $name): Response
    {
     
      return new JsonResponse('hello ' . $name);
    }
}