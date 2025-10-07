<?php

namespace App\Entity\Workout\Abstraction;

use App\Repository\Workout\Abstraction\ExerciseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseRepository::class)]
class Exercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID, index: true, unique: true)]
    private ?string $uid = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;


    /**
     * @var Collection<int, TrainingExerciseLink>
     */
    #[ORM\OneToMany(targetEntity: TrainingExerciseLink::class, mappedBy: 'exercise')]
    private Collection $trainingExerciseLinks;

    /**
     * @var Collection<int, ExerciseAttributeDefinition>
     */
    #[ORM\OneToMany(targetEntity: ExerciseAttributeDefinition::class, mappedBy: 'exercise')]
    private Collection $atributeDefinitions;

    public function __construct()
    {
        $this->trainingExerciseLinks = new ArrayCollection();
        $this->atributeDefinitions = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }



    /**
     * @return Collection<int, TrainingExerciseLink>
     */
    public function getTrainingExerciseLinks(): Collection
    {
        return $this->trainingExerciseLinks;
    }

    public function addTrainingExerciseLink(TrainingExerciseLink $trainingExerciseLink): static
    {
        if (!$this->trainingExerciseLinks->contains($trainingExerciseLink)) {
            $this->trainingExerciseLinks->add($trainingExerciseLink);
            $trainingExerciseLink->setExercise($this);
        }

        return $this;
    }

    public function removeTrainingExerciseLink(TrainingExerciseLink $trainingExerciseLink): static
    {
        if ($this->trainingExerciseLinks->removeElement($trainingExerciseLink)) {
            // set the owning side to null (unless already changed)
            if ($trainingExerciseLink->getExercise() === $this) {
                $trainingExerciseLink->setExercise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ExerciseAttributeDefinition>
     */
    public function getAtributeDefinitions(): Collection
    {
        return $this->atributeDefinitions;
    }

    public function addAtributeDefinition(ExerciseAttributeDefinition $atributeDefinition): static
    {
        if (!$this->atributeDefinitions->contains($atributeDefinition)) {
            $this->atributeDefinitions->add($atributeDefinition);
            $atributeDefinition->setExercise($this);
        }

        return $this;
    }

    public function removeAtributeDefinition(ExerciseAttributeDefinition $atributeDefinition): static
    {
        if ($this->atributeDefinitions->removeElement($atributeDefinition)) {
            // set the owning side to null (unless already changed)
            if ($atributeDefinition->getExercise() === $this) {
                $atributeDefinition->setExercise(null);
            }
        }

        return $this;
    }
}
