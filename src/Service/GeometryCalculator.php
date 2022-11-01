<?php

namespace App\Service;

use App\Repository\TriangleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GeometryCalculator extends AbstractController
{
public function getTriangleCalculation(TriangleRepository $triangleRepository,): JsonResponse
{
   
    $trianglesCount = count($triangleRepository->findAll());
    $trianglesCircumference = $triangleRepository->findAll();
    $trianglesArea = $triangleRepository->findAll();
    

    return $this->json([
        'number_Of_triangles:' => $trianglesCount ,
        'total_surface:' => $trianglesArea , 
        'total_circumference:' => $trianglesCircumference]);
   
}

}