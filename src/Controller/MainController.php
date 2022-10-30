<?php

namespace App\Controller;

use App\Repository\TriangleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index()
    {
        return new Response(content:'content was created');
    }
    #[Route('/home', name: 'home')]
    public function home(TriangleRepository $triangleRepository) 
    {
        $triangles = $triangleRepository->findAll();

        return $this->render('home/index.html.twig' , [
            'triangles' => $triangles
        ]);
    
    }
}
