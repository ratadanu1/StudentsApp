<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $nume = null;

    #[ORM\Column]
    private ?float $media = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birtDate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $grupa = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Specialitate $specialitate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNume(): ?string
    {
        return $this->nume;
    }

    public function setNume(string $nume): static
    {
        $this->nume = $nume;

        return $this;
    }

    public function getMedia(): ?float
    {
        return $this->media;
    }

    public function setMedia(float $media): static
    {
        $this->media = $media;

        return $this;
    }

    public function getBirtDate(): ?\DateTimeInterface
    {
        return $this->birtDate;
    }

    public function setBirtDate(\DateTimeInterface $birtDate): static
    {
        $this->birtDate = $birtDate;

        return $this;
    }

    public function getGrupa(): ?string
    {
        return $this->grupa;
    }

    public function setGrupa(string $grupa): static
    {
        $this->grupa = $grupa;

        return $this;
    }

    public function getSpecialitate(): ?Specialitate
    {
        return $this->specialitate;
    }

    public function setSpecialitate(?Specialitate $specialitate): static
    {
        $this->specialitate = $specialitate;

        return $this;
    }
}
