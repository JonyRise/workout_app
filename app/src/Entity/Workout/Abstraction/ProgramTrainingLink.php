<?php

namespace App\Entity\Workout\Abstraction;

use App\Repository\Workout\Abstraction\ProgramTrainingLinkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgramTrainingLinkRepository::class)]
class ProgramTrainingLink
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID)]
    private ?string $uid = null;

    #[ORM\ManyToOne(inversedBy: 'programTrainingLinks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Program $program = null;

    #[ORM\ManyToOne(inversedBy: 'programTrainingLinks')]
    private ?Training $training = null;

    #[ORM\Column]
    private ?int $orderInProgram = null;


    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }

    public function getProgram(): ?Program
    {
        return $this->program;
    }

    public function setProgram(?Program $program): static
    {
        $this->program = $program;

        return $this;
    }

    public function getTraining(): ?Training
    {
        return $this->training;
    }

    public function setTraining(?Training $training): static
    {
        $this->training = $training;

        return $this;
    }

    public function getOrderInProgram(): ?int
    {
        return $this->orderInProgram;
    }

    public function setOrderInProgram(int $orderInProgram): static
    {
        $this->orderInProgram = $orderInProgram;

        return $this;
    }

}
