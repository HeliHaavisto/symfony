<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $description;



    /**
     * @ORM\Column(type="array")
     */
    private $recipeIngredient = [];

    /**
     * @ORM\Column(type="array")
     */
    private $recipeInstructions = [];



    /**
     * @ORM\Column(type="string", length=20)
     */
    private $difficulty;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getRecipeIngredient(): ?array
    {
        return $this->recipeIngredient;
    }

    public function setRecipeIngredient(array $recipeIngredient): self
    {
        $this->recipeIngredient = $recipeIngredient;

        return $this;
    }

    public function getRecipeInstructions(): ?array
    {
        return $this->recipeInstructions;
    }

    public function setRecipeInstructions(array $recipeInstructions): self
    {
        $this->recipeInstructions = $recipeInstructions;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }
}
