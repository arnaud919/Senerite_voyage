<?php

namespace App\Entity;

use App\Repository\PhotoAccomodationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoAccomodationRepository::class)]
class PhotoAccomodation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name_photo_accomodation = null;

    #[ORM\ManyToOne(inversedBy: 'photoAccomodations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Accomodation $accomodation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamePhotoAccomodation(): ?string
    {
        return $this->name_photo_accomodation;
    }

    public function setNamePhotoAccomodation(?string $name_photo_accomodation): static
    {
        $this->name_photo_accomodation = $name_photo_accomodation;

        return $this;
    }

    public function getIdAccomodation(): ?Accomodation
    {
        return $this->accomodation;
    }

    public function setIdAccomodation(?Accomodation $accomodation): static
    {
        $this->accomodation = $accomodation;

        return $this;
    }
}
