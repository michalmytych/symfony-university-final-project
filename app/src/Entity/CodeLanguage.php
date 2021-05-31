<?php

namespace App\Entity;

use App\Repository\CodeLanguageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents coding language available for solutions.
 *
 * @ORM\Entity(repositoryClass=CodeLanguageRepository::class)
 * @ORM\Table(name="code_languages")
 */
class CodeLanguage
{
    /**
     * Unique coding language identifier.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Name of coding language.
     *
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * Code of coding language available at Jdoodle.
     *
     * @ORM\Column(type="string", length=16)
     */
    private $jdoodleCode;

    /**
     * Get identifier of coding language.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get name of coding language.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set name of coding language.
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get code of language available at Jdoodle.
     *
     * @return string|null
     */
    public function getJdoodleCode(): ?string
    {
        return $this->jdoodleCode;
    }

    /**
     * Set code of language available at Jdoodle.
     *
     * @param string $jdoodleCode
     * @return $this
     */
    public function setJdoodleCode(string $jdoodleCode): self
    {
        $this->jdoodleCode = $jdoodleCode;

        return $this;
    }
}
