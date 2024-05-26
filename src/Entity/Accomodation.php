<?php

namespace App\Entity;

use App\Repository\AccomodationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccomodationRepository::class)]
class Accomodation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_accomodation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description_accomodation = null;

    #[ORM\Column]
    private ?float $price_night = null;

    #[ORM\ManyToOne(inversedBy: 'accomodations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PostalCode $postal_code = null;

    #[ORM\ManyToOne(inversedBy: 'accomodations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeAccomodation $type_accomodation = null;

    #[ORM\ManyToOne(inversedBy: 'accomodations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Destination $destination = null;

    /**
     * @var Collection<int, PhotoAccomodation>
     */
    #[ORM\OneToMany(targetEntity: PhotoAccomodation::class, mappedBy: 'accomodation')]
    private Collection $photoAccomodations;

    #[ORM\OneToOne(mappedBy: 'accomodation', cascade: ['persist', 'remove'])]
    private ?Reservation $reservation = null;

    #[ORM\Column(length: 255)]
    private ?string $address_accomodation = null;

    public function __construct()
    {
        $this->photoAccomodations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameAccomodation(): ?string
    {
        return $this->name_accomodation;
    }

    public function setNameAccomodation(string $name_accomodation): static
    {
        $this->name_accomodation = $name_accomodation;

        return $this;
    }

    public function getDescriptionAccomodation(): ?string
    {
        return $this->description_accomodation;
    }

    public function setDescriptionAccomodation(string $description_accomodation): static
    {
        $this->description_accomodation = $description_accomodation;

        return $this;
    }

    public function getPriceNight(): ?float
    {
        return $this->price_night;
    }

    public function setPriceNight(float $price_night): static
    {
        $this->price_night = $price_night;

        return $this;
    }

    public function getIdPostalCode(): ?PostalCode
    {
        return $this->postal_code;
    }

    public function setIdPostalCode(?PostalCode $postal_code): static
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getIdTypeAccomodation(): ?TypeAccomodation
    {
        return $this->type_accomodation;
    }

    public function setIdTypeAccomodation(?TypeAccomodation $type_accomodation): static
    {
        $this->type_accomodation = $type_accomodation;

        return $this;
    }

    public function getIdDestination(): ?Destination
    {
        return $this->destination;
    }

    public function setIdDestination(?Destination $destination): static
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return Collection<int, PhotoAccomodation>
     */
    public function getPhotoAccomodations(): Collection
    {
        return $this->photoAccomodations;
    }

    public function addPhotoAccomodation(PhotoAccomodation $photoAccomodation): static
    {
        if (!$this->photoAccomodations->contains($photoAccomodation)) {
            $this->photoAccomodations->add($photoAccomodation);
            $photoAccomodation->setIdAccomodation($this);
        }

        return $this;
    }

    public function removePhotoAccomodation(PhotoAccomodation $photoAccomodation): static
    {
        if ($this->photoAccomodations->removeElement($photoAccomodation)) {
            // set the owning side to null (unless already changed)
            if ($photoAccomodation->getIdAccomodation() === $this) {
                $photoAccomodation->setIdAccomodation(null);
            }
        }

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation): static
    {
        // set the owning side of the relation if necessary
        if ($reservation->getIdAccomodation() !== $this) {
            $reservation->setIdAccomodation($this);
        }

        $this->reservation = $reservation;

        return $this;
    }

    public function getAddressAccomodation(): ?string
    {
        return $this->address_accomodation;
    }

    public function setAddressAccomodation(string $address_accomodation): static
    {
        $this->address_accomodation = $address_accomodation;

        return $this;
    }
}
