<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PredmetiRepository")
 */
class Predmeti
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ime;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $kod;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $program;

    /**
     * @ORM\Column(type="integer")
     */
    private $bodovi;

    /**
     * @ORM\Column(type="integer")
     */
    private $sem_redovni;

    /**
     * @ORM\Column(type="integer")
     */
    private $sem_izvanredni;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $izborni;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Upisi", mappedBy="predmet_id")
     */
    private $upisi;

    public function __construct()
    {
        $this->upisi = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIme(): ?string
    {
        return $this->ime;
    }

    public function setIme(string $ime): self
    {
        $this->ime = $ime;

        return $this;
    }

    public function getKod(): ?string
    {
        return $this->kod;
    }

    public function setKod(string $kod): self
    {
        $this->kod = $kod;

        return $this;
    }

    public function getProgram(): ?string
    {
        return $this->program;
    }

    public function setProgram(string $program): self
    {
        $this->program = $program;

        return $this;
    }

    public function getBodovi(): ?int
    {
        return $this->bodovi;
    }

    public function setBodovi(int $bodovi): self
    {
        $this->bodovi = $bodovi;

        return $this;
    }

    public function getSem_Redovni(): ?int
    {
        return $this->sem_redovni;
    }

    public function setSem_Redovni(int $sem_redovni): self
    {
        $this->sem_redovni = $sem_redovni;

        return $this;
    }

    public function getSem_Izvanredni(): ?int
    {
        return $this->sem_izvanredni;
    }

    public function setSem_Izvanredni(int $sem_izvanredni): self
    {
        $this->sem_izvanredni = $sem_izvanredni;

        return $this;
    }
    public function getSemRedovni(): ?int
    {
        return $this->sem_redovni;
    }

    public function setSemRedovni(int $sem_redovni): self
    {
        $this->sem_redovni = $sem_redovni;

        return $this;
    }

    public function getSemIzvanredni(): ?int
    {
        return $this->sem_izvanredni;
    }

    public function setSemIzvanredni(int $sem_izvanredni): self
    {
        $this->sem_izvanredni = $sem_izvanredni;

        return $this;
    }

    public function getIzborni(): ?string
    {
        return $this->izborni;
    }

    public function setIzborni(string $izborni): self
    {
        $this->izborni = $izborni;

        return $this;
    }

    /**
     * @return Collection|Upisi[]
     */
    public function getUpisi(): Collection
    {
        return $this->upisi;
    }

    public function addUpisi(Upisi $upisi): self
    {
        if (!$this->upisi->contains($upisi)) {
            $this->upisi[] = $upisi;
            $upisi->setPredmetId($this);
        }

        return $this;
    }

    public function removeUpisi(Upisi $upisi): self
    {
        if ($this->upisi->contains($upisi)) {
            $this->upisi->removeElement($upisi);
            // set the owning side to null (unless already changed)
            if ($upisi->getPredmetId() === $this) {
                $upisi->setPredmetId(null);
            }
        }

        return $this;
    }
}
