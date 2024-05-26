<?php

namespace App\Entity;

use App\Repository\PostalCodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostalCodeRepository::class)]
class PostalCode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Accomodation>
     */
    #[ORM\OneToMany(targetEntity: Accomodation::class, mappedBy: 'id_postal_code')]
    private Collection $accomodations;

    #[ORM\Column]
    private ?int $number_postal_code = null;

    public function __construct()
    {
        $this->accomodations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Accomodation>
     */
    public function getAccomodations(): Collection
    {
        return $this->accomodations;
    }

    public function addAccomodation(Accomodation $accomodation): static
    {
        if (!$this->accomodations->contains($accomodation)) {
            $this->accomodations->add($accomodation);
            $accomodation->setIdPostalCode($this);
        }

        return $this;
    }

    public function removeAccomodation(Accomodation $accomodation): static
    {
        if ($this->accomodations->removeElement($accomodation)) {
            // set the owning side to null (unless already changed)
            if ($accomodation->getIdPostalCode() === $this) {
                $accomodation->setIdPostalCode(null);
            }
        }

        return $this;
    }

    public function getNumberPostalCode(): ?int
    {
        return $this->number_postal_code;
    }

    public function setNumberPostalCode(int $number_postal_code): static
    {
        $this->number_postal_code = $number_postal_code;

        return $this;
    }
}
