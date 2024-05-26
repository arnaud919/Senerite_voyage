<?php

namespace App\Entity;

use App\Repository\TypeAccomodationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeAccomodationRepository::class)]
class TypeAccomodation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name_accomodation = null;

    /**
     * @var Collection<int, Accomodation>
     */
    #[ORM\OneToMany(targetEntity: Accomodation::class, mappedBy: 'id_type_accomodation')]
    private Collection $accomodations;

    public function __construct()
    {
        $this->accomodations = new ArrayCollection();
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
            $accomodation->setIdTypeAccomodation($this);
        }

        return $this;
    }

    public function removeAccomodation(Accomodation $accomodation): static
    {
        if ($this->accomodations->removeElement($accomodation)) {
            // set the owning side to null (unless already changed)
            if ($accomodation->getIdTypeAccomodation() === $this) {
                $accomodation->setIdTypeAccomodation(null);
            }
        }

        return $this;
    }
}
