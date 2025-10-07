<?php

namespace App\Entity\Workout\UserData;

use App\Entity\Workout\Abstraction\Training;
use App\Repository\Workout\UserData\UserTrainingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserTrainingRepository::class)]
class UserTraining
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID, index: true, unique: true)]
    private ?string $uid = null;

    #[ORM\ManyToOne(inversedBy: 'userTrainings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserProgram $program = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Training $training = null;

    /**
     * @var Collection<int, UserExercise>
     */
    #[ORM\OneToMany(targetEntity: UserExercise::class, mappedBy: 'training')]
    private Collection $userExercises;

    public function __construct()
    {
        $this->userExercises = new ArrayCollection();
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

    public function getProgram(): ?UserProgram
    {
        return $this->program;
    }

    public function setProgram(?UserProgram $program): static
    {
        $this->program = $program;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;

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

    /**
     * @return Collection<int, UserExercise>
     */
    public function getUserExercises(): Collection
    {
        return $this->userExercises;
    }

    public function addUserExercise(UserExercise $userExercise): static
    {
        if (!$this->userExercises->contains($userExercise)) {
            $this->userExercises->add($userExercise);
            $userExercise->setTraining($this);
        }

        return $this;
    }

    public function removeUserExercise(UserExercise $userExercise): static
    {
        if ($this->userExercises->removeElement($userExercise)) {
            // set the owning side to null (unless already changed)
            if ($userExercise->getTraining() === $this) {
                $userExercise->setTraining(null);
            }
        }

        return $this;
    }
}
