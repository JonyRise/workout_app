<?php

namespace App\Entity\Workout\UserData;

use App\Entity\Workout\Abstraction\ExerciseAttributeDefinition;
use App\Repository\Workout\UserData\SetAtributeValueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SetAtributeValueRepository::class)]
class SetAtributeValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID, index: true, unique: true)]
    private ?string $uid = null;

    #[ORM\ManyToOne(inversedBy: 'attributeValues')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserSet $userSet = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ExerciseAttributeDefinition $attribute = null;

    #[ORM\Column(length: 255)]
    private ?string $value = null;

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

    public function getUserSet(): ?UserSet
    {
        return $this->userSet;
    }

    public function setUserSet(?UserSet $userSet): static
    {
        $this->userSet = $userSet;

        return $this;
    }

    public function getAttribute(): ?ExerciseAttributeDefinition
    {
        return $this->attribute;
    }

    public function setAttribute(?ExerciseAttributeDefinition $attribute): static
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
