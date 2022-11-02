<?php

namespace App\Service;

use App\Repository\TriangleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GeometryCalculator extends AbstractController
{
public function getTriangleCalculation(TriangleRepository $triangleRepository,): JsonResponse
{
   
    $triangles = $triangleRepository->findBy([]);

    if (count($triangles)< 1){
        throw $this->createNotFoundException(
            'No triangles found'
        );
    }

        $ret = [
            'number_of_triangles' => 0,
            'total_surface' => 0,
            'total_circumference' =>0
        ] ;
        foreach($triangles as $triangle){
            $ret['number_of_triangles'] ++ ;
            $ret['total_surface'] += $triangle->getAreaT() ;
            $ret['total_circumference'] += $triangle->getCircumferenceT() ;

        }
   return $this->json($ret);
}

}