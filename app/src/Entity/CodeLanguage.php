<?php

namespace App\Entity;

use App\Repository\CodeLanguageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CodeLanguageRepository::class)
 */
class CodeLanguage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $jdoodle_code;

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

    public function getJdoodleCode(): ?string
    {
        return $this->jdoodle_code;
    }

    public function setJdoodleCode(string $jdoodle_code): self
    {
        $this->jdoodle_code = $jdoodle_code;

        return $this;
    }
}
