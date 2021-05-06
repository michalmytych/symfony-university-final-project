<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=2, nullable=true)
     */
    private $final_score;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=2)
     */
    private $auto_score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getFinalScore(): ?string
    {
        return $this->final_score;
    }

    public function setFinalScore(?string $final_score): self
    {
        $this->final_score = $final_score;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAutoScore(): ?string
    {
        return $this->auto_score;
    }

    public function setAutoScore(string $auto_score): self
    {
        $this->auto_score = $auto_score;

        return $this;
    }
}
