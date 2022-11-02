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

    public function getAreaT(): ?float
    {
        return round(sqrt((($this->sideA+$this->sideB+$this->sideC)/2)*
        ((($this->sideA+$this->sideB+$this->sideC)/2)-$this->sideA)*
        ((($this->sideA+$this->sideB+$this->sideC)/2)-$this->sideB)*
        ((($this->sideA+$this->sideB+$this->sideC)/2)-$this->sideC)), 2);
    }  
}
