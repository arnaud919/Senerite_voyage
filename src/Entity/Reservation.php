<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $total_price_reservation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $departure_date_reservation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $arrival_date_reservation = null;

    #[ORM\Column]
    private ?float $price_night = null;

    #[ORM\Column]
    private ?int $number_person = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToOne(inversedBy: 'reservation', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Accomodation $accomodation = null;

    /**
     * @var Collection<int, PersonType>
     */
    #[ORM\ManyToMany(targetEntity: PersonType::class, inversedBy: 'reservations')]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalPriceReservation(): ?float
    {
        return $this->total_price_reservation;
    }

    public function setTotalPriceReservation(float $total_price_reservation): static
    {
        $this->total_price_reservation = $total_price_reservation;

        return $this;
    }

    public function getDepartureDateReservation(): ?\DateTimeInterface
    {
        return $this->departure_date_reservation;
    }

    public function setDepartureDateReservation(\DateTimeInterface $departure_date_reservation): static
    {
        $this->departure_date_reservation = $departure_date_reservation;

        return $this;
    }

    public function getArrivalDateReservation(): ?\DateTimeInterface
    {
        return $this->arrival_date_reservation;
    }

    public function setArrivalDateReservation(\DateTimeInterface $arrival_date_reservation): static
    {
        $this->arrival_date_reservation = $arrival_date_reservation;

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

    public function getNumberPerson(): ?int
    {
        return $this->number_person;
    }

    public function setNumberPerson(int $number_person): static
    {
        $this->number_person = $number_person;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->user;
    }

    public function setIdUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getIdAccomodation(): ?Accomodation
    {
        return $this->accomodation;
    }

    public function setIdAccomodation(Accomodation $accomodation): static
    {
        $this->accomodation = $accomodation;

        return $this;
    }

    /**
     * @return Collection<int, PersonType>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(PersonType $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
        }

        return $this;
    }

    public function removeReservation(PersonType $reservation): static
    {
        $this->reservations->removeElement($reservation);

        return $this;
    }

}
