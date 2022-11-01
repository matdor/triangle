<?php

namespace App\Controller;

use App\Entity\Triangle;
use App\Repository\TriangleRepository;
use App\Form\TriangleType;
use App\Service\GeometryCalculator;
use Doctrine\Migrations\Configuration\EntityManager\ManagerRegistryEntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use function Symfony\Component\String\b;

#[Route('/triangle', name: 'triangle')]
class TriangleController extends AbstractController
{
    #[Route('/', name: '.home')]
    public function index(TriangleRepository $triangleRepository) 
    {
        $triangles = $triangleRepository->findAll();

               return $this->render('triangle/index.html.twig' , [
                'triangles' => $triangles
        ]);
    
    }

    #[Route('/{a}/{b}/{c}' , name: '.create')]
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

        return $this->redirect($this->generateUrl('triangle.home'));
    }

    #[Route('/show/{id}', name: '.show')]
    public function show($id, TriangleRepository $triangleRepository) 
    {
        $triangles = $triangleRepository->find($id);

               return $this->render('triangle/show.html.twig' , [
                'triangles' => $triangles
        ]);
    }

    #[Route('/new' , name: '.new')]
    public function createNew(Request $request, ManagerRegistry $doctrine):Response
    {
        //create new triangle with sides a b c

        $createTriangle = new Triangle();

            $form = $this->createForm(TriangleType::class, $createTriangle);

            $form -> handleRequest($request);

            if ($form->isSubmitted()){
                
       
                $em = $doctrine->getManager();
                $em->persist($createTriangle);
                $em->flush();

                return $this->redirect($this->generateUrl('triangle.home'));

            }

        return $this->render('triangle/create.html.twig', [
            'form' => $form ->createView()
        ]);
    }
    
    #[Route('/delete/{id}', name: '.delete')]
    public function remove(Triangle $Triangle, ManagerRegistry $doctrine) 
    {
        $em = $doctrine->getManager();
        $em->remove($Triangle);
        $em->flush();

        $this->addFlash(type:'success', message:'The triangle was removed');

               return $this->redirect($this->generateUrl('triangle.home'));
    
    }

    #[Route('/triangles', name: '.GeometryCalculator')]
    public function triangles(GeometryCalculator $geometryCalculator) :JsonResponse
    {
            $triangleOutput = $geometryCalculator->getTrianglecalCulation();

               return ($triangleOutput);
    
    }

}