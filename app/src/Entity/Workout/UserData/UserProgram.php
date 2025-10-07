<?php

namespace App\Entity\Workout\UserData;

use App\Entity\Workout\Abstraction\Program;
use App\Repository\Workout\UserData\UserProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserProgramRepository::class)]
class UserProgram
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID, index: true, unique: true)]
    private ?string $uid = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Program $program = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $startedAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $endedAt = null;

    /**
     * @var Collection<int, UserTraining>
     */
    #[ORM\OneToMany(targetEntity: UserTraining::class, mappedBy: 'program')]
    private Collection $userTrainings;

    public function __construct()
    {
        $this->userTrainings = new ArrayCollection();
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

    public function getStartedAt(): ?\DateTimeImmutable
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeImmutable $startedAt): static
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeImmutable
    {
        return $this->endedAt;
    }

    public function setEndedAt(\DateTimeImmutable $endedAt): static
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    /**
     * @return Collection<int, UserTraining>
     */
    public function getUserTrainings(): Collection
    {
        return $this->userTrainings;
    }

    public function addUserTraining(UserTraining $userTraining): static
    {
        if (!$this->userTrainings->contains($userTraining)) {
            $this->userTrainings->add($userTraining);
            $userTraining->setProgram($this);
        }

        return $this;
    }

    public function removeUserTraining(UserTraining $userTraining): static
    {
        if ($this->userTrainings->removeElement($userTraining)) {
            // set the owning side to null (unless already changed)
            if ($userTraining->getProgram() === $this) {
                $userTraining->setProgram(null);
            }
        }

        return $this;
    }
}
