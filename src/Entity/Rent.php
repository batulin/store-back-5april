<?php

namespace App\Entity;

use App\Repository\RentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentRepository::class)]
class Rent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $beginDate = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $endDate = null;

    #[ORM\ManyToOne(inversedBy: 'rents')]
    private ?Client $client = null;

    #[ORM\ManyToMany(targetEntity: Place::class, inversedBy: 'rents')]
    private Collection $places;

    #[ORM\Column]
    private ?int $dayPrice = null;

    #[ORM\OneToMany(mappedBy: 'rent', targetEntity: Payment::class)]
    private Collection $payments;

    public function __construct()
    {
        $this->places = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginDate(): ?\DateTimeImmutable
    {
        return $this->beginDate;
    }

    public function setBeginDate(\DateTimeImmutable $beginDate): self
    {
        $this->beginDate = $beginDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeImmutable $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getPlaces(): Collection
    {
        return $this->places;
    }

    public function addPlace(Place $place): self
    {
        if (!$this->places->contains($place)) {
            $this->places->add($place);
        }

        return $this;
    }

    public function removePlace(Place $place): self
    {
        $this->places->removeElement($place);

        return $this;
    }

    public function getDayPrice(): int
    {
        return $this->dayPrice;
    }

    public function setDayPrice(int $dayPrice): self
    {
        $this->dayPrice = $dayPrice;

        return $this;
    }

    /**
     * @return Collection<int, Rent>
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    public function addPayment(Payment $payment): self
    {
        if (!$this->payments->contains($payment)) {
            $this->payments->add($payment);
            $payment->setRent($this);
        }

        return $this;
    }

    public function removePayment(Payment $payment): self
    {
        if ($this->payments->removeElement($payment)) {
            // set the owning side to null (unless already changed)
            if ($payment->getRent() === $this) {
                $payment->setRent(null);
            }
        }

        return $this;
    }
}
