<?php

namespace App\Entity;

use App\Repository\SolutionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolutionRepository::class)
 */
class Solution
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $submitted_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubmittedAt(): ?\DateTimeInterface
    {
        return $this->submitted_at;
    }

    public function setSubmittedAt(\DateTimeInterface $submitted_at): self
    {
        $this->submitted_at = $submitted_at;

        return $this;
    }
}

