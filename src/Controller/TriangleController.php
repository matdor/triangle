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

use function Symfony\Component\String\b;

class TriangleController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(TriangleRepository $triangleRepository) 
    {
        $triangles = $triangleRepository->findAll();

        dump($triangles);
        return $this->render('home/index.html.twig' , [
            'triangles' => $triangles
        ]);
    
    }

    #[Route('/triangle', name: 'triangle')]
    public function index() 
    {
               return $this->render('triangle/index.html.twig' , [
            'controller_name' => 'TriangleController'
        ]);
    
    }

    #[Route('/triangle/{a}/{b}/{c}' , name: 'create')]
    public function create(Request $request, $a, $b, $c, ManagerRegistry $doctrine):Response
    {
        $a = $request->get('a');
        $b = $request->get('b');
        $c = $request->get('c');
        //create new triangle with sides a b c

        $createTriangle = new Triangle();
        $createTriangle -> setSideA($a);
        $createTriangle -> setSideB($b);
        $createTriangle -> setSideC($c);
        
        //push the created triangle into the db
        $em = $doctrine->getManager();
        $em->persist($createTriangle);
        $em->flush();

        return new Response('The Triangle was created');
    }
    #[Route('/show' , name: 'overview')]
    public function show(){

        return $this ->render('show/index.html.twig', [

        ]);

    }

   /* #[Route('/newTriangle' , name: 'NewTriangle')]
    public function new(request $request, ManagerRegistry $doctrine)
    {
            //create new triangle with sides a b c
            $createTriangle = new Triangle();
                    
            $form = $this->createForm(TriangleInput::class, $createTriangle)
            
            //push the created triangle into the db
            $em = $doctrine->getManager();
            $em->persist($createTriangle);
            $em->flush();

            return $this ->render('show/index.html.twig', [

            ]);
            
        
    }*/
}