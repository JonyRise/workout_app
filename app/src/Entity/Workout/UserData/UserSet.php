<?php

namespace App\Entity\Workout\UserData;

use App\Repository\Workout\UserData\UserSetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSetRepository::class)]
class UserSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID, index: true, unique: true)]
    private ?string $uid = null;

    #[ORM\ManyToOne(inversedBy: 'userSets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserExercise $exercise = null;

    #[ORM\Column]
    private ?int $orderInExercise = null;

    /**
     * @var Collection<int, SetAtributeValue>
     */
    #[ORM\OneToMany(targetEntity: SetAtributeValue::class, mappedBy: 'userSet')]
    private Collection $attributeValues;

    public function __construct()
    {
        $this->attributeValues = new ArrayCollection();
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

    public function getExercise(): ?UserExercise
    {
        return $this->exercise;
    }

    public function setExercise(?UserExercise $exercise): static
    {
        $this->exercise = $exercise;

        return $this;
    }

    public function getOrderInExercise(): ?int
    {
        return $this->orderInExercise;
    }

    public function setOrderInExercise(int $orderInExercise): static
    {
        $this->orderInExercise = $orderInExercise;

        return $this;
    }

    /**
     * @return Collection<int, SetAtributeValue>
     */
    public function getAttributeValues(): Collection
    {
        return $this->attributeValues;
    }

    public function addAttributeValue(SetAtributeValue $attributeValue): static
    {
        if (!$this->attributeValues->contains($attributeValue)) {
            $this->attributeValues->add($attributeValue);
            $attributeValue->setUserSet($this);
        }

        return $this;
    }

    public function removeAttributeValue(SetAtributeValue $attributeValue): static
    {
        if ($this->attributeValues->removeElement($attributeValue)) {
            // set the owning side to null (unless already changed)
            if ($attributeValue->getUserSet() === $this) {
                $attributeValue->setUserSet(null);
            }
        }

        return $this;
    }
}
