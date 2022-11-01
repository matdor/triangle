<?php

namespace App\Service;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GeometryCalculator extends AbstractController
{
public function getTrianglecalCulation(): JsonResponse
{
    $trianglesCount = 0;
    $trianglesCircumference = 0;
    $trianglesArea = 0;


    return $this->json([
        'number_Of_triangles:' => $trianglesCount ,
        'total_surface:' => $trianglesCircumference , 
        'total_circumference:' => $trianglesArea]);
}

}