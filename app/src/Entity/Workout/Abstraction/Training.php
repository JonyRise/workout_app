<?php

namespace App\Entity\Workout\Abstraction;

use App\Entity\Workout\Abstraction\TrainingCategory;
use App\Repository\Workout\Abstraction\TrainingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainingRepository::class)]
class Training
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

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'trainings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TrainingCategory $category = null;

    /**
     * @var Collection<int, ProgramTrainingLink>
     */
    #[ORM\OneToMany(targetEntity: ProgramTrainingLink::class, mappedBy: 'training')]
    private Collection $programTrainingLinks;

    /**
     * @var Collection<int, TrainingExerciseLink>
     */
    #[ORM\OneToMany(targetEntity: TrainingExerciseLink::class, mappedBy: 'training')]
    private Collection $trainingExerciseLinks;


    public function __construct()
    {
        $this->programTrainingLinks = new ArrayCollection();
        $this->trainingExerciseLinks = new ArrayCollection();
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

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?TrainingCategory
    {
        return $this->category;
    }

    public function setCategory(?TrainingCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, ProgramTrainingLink>
     */
    public function getProgramTrainingLinks(): Collection
    {
        return $this->programTrainingLinks;
    }

    public function addProgramTrainingLink(ProgramTrainingLink $programTrainingLink): static
    {
        if (!$this->programTrainingLinks->contains($programTrainingLink)) {
            $this->programTrainingLinks->add($programTrainingLink);
            $programTrainingLink->setTraining($this);
        }

        return $this;
    }

    public function removeProgramTrainingLink(ProgramTrainingLink $programTrainingLink): static
    {
        if ($this->programTrainingLinks->removeElement($programTrainingLink)) {
            // set the owning side to null (unless already changed)
            if ($programTrainingLink->getTraining() === $this) {
                $programTrainingLink->setTraining(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TrainingExerciseLink>
     */
    public function getTrainingExerciseLinks(): Collection
    {
        return $this->trainingExerciseLinks;
    }

    public function addTrainingExerciseLinks(TrainingExerciseLink $trainingExerciseLinks): static
    {
        if (!$this->trainingExerciseLinks->contains($trainingExerciseLinks)) {
            $this->trainingExerciseLinks->add($trainingExerciseLinks);
            $trainingExerciseLinks->setTraining($this);
        }

        return $this;
    }

    public function removeTrainingExerciseLinks(TrainingExerciseLink $trainingExerciseLinks): static
    {
        if ($this->trainingExerciseLinks->removeElement($trainingExerciseLinks)) {
            // set the owning side to null (unless already changed)
            if ($trainingExerciseLinks->getTraining() === $this) {
                $trainingExerciseLinks->setTraining(null);
            }
        }

        return $this;
    }


}
