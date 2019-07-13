<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UpisiRepository")
 */
class Upisi
{

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="upisi")
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Predmeti", inversedBy="upisi")
     * @ORM\JoinColumn(nullable=false)
     */
    private $predmet;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $status;


    public function getStudent_id(): ?User
    {
        return $this->student;
    }

    public function setStudent_id(?User $student): self
    {
        $this->student = $student;

        return $this;
    }
    public function getStudent(): ?User
    {
        return $this->student;
    }

    public function setStudent(?User $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getPredmet_id(): ?predmeti
    {
        return $this->predmet;
    }

    public function setPredmet_id(?predmeti $predmet): self
    {
        $this->predmet = $predmet;

        return $this;
    }
    public function getPredmet(): ?predmeti
    {
        return $this->predmet;
    }

    public function setPredmet(?predmeti $predmet): self
    {
        $this->predmet = $predmet;

        return $this;
    }
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

}
