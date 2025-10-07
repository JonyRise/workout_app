<?php

namespace App\Entity\Workout\UserData;

use App\Entity\Workout\Abstraction\Exercise;
use App\Repository\Workout\UserData\UserExerciseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserExerciseRepository::class)]
class UserExercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID, index: true, unique: true)]
    private ?string $uid = null;

    #[ORM\ManyToOne(inversedBy: 'userExercises')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserTraining $training = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Exercise $exercise = null;

    /**
     * @var Collection<int, UserSet>
     */
    #[ORM\OneToMany(targetEntity: UserSet::class, mappedBy: 'exercise')]
    private Collection $userSets;

    public function __construct()
    {
        $this->userSets = new ArrayCollection();
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

    public function getTraining(): ?UserTraining
    {
        return $this->training;
    }

    public function setTraining(?UserTraining $training): static
    {
        $this->training = $training;

        return $this;
    }

    public function getExercise(): ?Exercise
    {
        return $this->exercise;
    }

    public function setExercise(?Exercise $exercise): static
    {
        $this->exercise = $exercise;

        return $this;
    }

    /**
     * @return Collection<int, UserSet>
     */
    public function getUserSets(): Collection
    {
        return $this->userSets;
    }

    public function addUserSet(UserSet $userSet): static
    {
        if (!$this->userSets->contains($userSet)) {
            $this->userSets->add($userSet);
            $userSet->setExercise($this);
        }

        return $this;
    }

    public function removeUserSet(UserSet $userSet): static
    {
        if ($this->userSets->removeElement($userSet)) {
            // set the owning side to null (unless already changed)
            if ($userSet->getExercise() === $this) {
                $userSet->setExercise(null);
            }
        }

        return $this;
    }
}
