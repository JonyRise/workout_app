<?php

namespace App\Entity\Workout\Abstraction;

use App\Repository\Workout\Abstraction\ProgramRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProgramRepository::class)]
class Program
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

    /**
     * @var Collection<int, ProgramTrainingLink>
     */
    #[ORM\OneToMany(targetEntity: ProgramTrainingLink::class, mappedBy: 'program')]
    private Collection $programTrainingLinks;

    public function __construct()
    {
        $this->programTrainingLinks = new ArrayCollection();
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
            $programTrainingLink->setProgram($this);
        }

        return $this;
    }

    public function removeProgramTrainingLink(ProgramTrainingLink $programTrainingLink): static
    {
        if ($this->programTrainingLinks->removeElement($programTrainingLink)) {
            // set the owning side to null (unless already changed)
            if ($programTrainingLink->getProgram() === $this) {
                $programTrainingLink->setProgram(null);
            }
        }

        return $this;
    }
}
