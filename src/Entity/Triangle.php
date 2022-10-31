<?php

namespace App\Entity;

use App\Repository\TriangleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Response;

#[ORM\Entity(repositoryClass: TriangleRepository::class)]
class Triangle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $sideA = null;

    #[ORM\Column]
    private ?float $sideB = null;

    #[ORM\Column]
    private ?float $sideC = null;

    private ?float $heightT = null;

    private ?float $circumferenceT = null;

    private ?float $baseT = null;

    private ?float $areaT = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSideA(): ?float
    {
        return $this->sideA;
    }

    public function setSideA(float $sideA): self
    {
        $this->sideA = $sideA;

        return $this;
    }

    public function getSideB(): ?float
    {
        return $this->sideB;
    }

    public function setSideB(float $sideB): self
    {
        $this->sideB = $sideB;

        return $this;
    }

    public function getSideC(): ?float
    {
        return $this->sideC;
    }

    public function setSideC(float $sideC): self
    {
        $this->sideC = $sideC;

        return $this;
    }

    public function getCircumferenceT(): ?float
    {
        return $this->sideA + $this->sideB + $this->sideC;
    }

    public function setCircomferenceT(float $circumferenceT)
    {
        $this->circumferenceT = $circumferenceT;

        return $this;
    }

    public function getHeightT(): ?float
    {
        return $this->circumferenceT/2;
    }

    public function setHeightT(float $heightT)
    {
        $this->heightT = $heightT;

        return $this;
    }

    public function getBaseT(): ?float
    {
        return max($this->sideA, $this->sideB, $this->sideC);
    }
    
    public function setBaseT(float $baseT)
    {
        $this->baseT = $baseT;

        return $this;
    }

    public function getAreaT(): ?float
    {
        return $this->baseT;
    }

    public function setAreaT(float $areaT)
    {
        $this->areaT = $areaT;

        return $this;
    }
    

}
