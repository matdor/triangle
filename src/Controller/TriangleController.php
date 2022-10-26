<?php

namespace App\Controller;

use App\Entity\Triangle;
use App\Repository\TriangleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TriangleController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(TriangleRepository $triangleRepository) 
    {
        $triangles = $triangleRepository->findAll();

        dump($triangles);
        return $this->render('home/index.html.twig' , [
            'triangles' => $triangles
        ]);
    
    }

    #[Route('/triangle/{a}/{b}/{c}' , name: 'create')]
    public function create(request $request, ManagerRegistry $doctrine)
    {
        //create new triangle with sides a b c
        $createTriangle = new Triangle();
        
        $createTriangle -> setSideA('a');
        $createTriangle -> setSideB('b');
        $createTriangle -> setSideC('c');
        
        //push the created triangle into the db
        $em = $doctrine->getManager();
        $em->persist($createTriangle);
        $em->flush();

        return new Response('The Triangle was created');
    }
}