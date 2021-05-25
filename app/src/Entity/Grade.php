<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents grade provided by teacher-like user for specific coding problem solution.
 *
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 * @ORM\Table(name="grades")
 */
class Grade
{
    /**
     * Unique grade identifier.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Grade comment.
     *
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $comment;

    /**
     * Grade final score.
     *
     * @ORM\Column(type="decimal", precision=3, scale=2, nullable=true)
     */
    private $final_score;

    /**
     * Datetime when grade was created.
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * Automatically added score, when none is provided.
     *
     * @ORM\Column(type="decimal", precision=3, scale=2)
     */
    private $auto_score;

    /**
     * Solution to which grade is related.
     *
     * @ORM\OneToOne(targetEntity=Solution::class, mappedBy="grade", cascade={"persist", "remove"})
     */
    private $solution;

    /**
     * Get unique grade identifier.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get grade comment.
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Set grade comment.
     *
     * @param string|null $comment
     * @return $this
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get grade final score.
     *
     * @return string|null
     */
    public function getFinalScore(): ?string
    {
        return $this->final_score;
    }

    /**
     * Set grade final score.
     *
     * @param string|null $final_score
     * @return $this
     */
    public function setFinalScore(?string $final_score): self
    {
        $this->final_score = $final_score;

        return $this;
    }

    /**
     * Get datetime when grade was created.
     *
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * Set datetime when grade was created.
     *
     * @param DateTimeInterface|null $created_at
     * @return $this
     */
    public function setCreatedAt(?DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get grade auto score.
     *
     * @return string|null
     */
    public function getAutoScore(): ?string
    {
        return $this->auto_score;
    }

    /**
     * Set grade auto score.
     *
     * @param string $auto_score
     * @return $this
     */
    public function setAutoScore(string $auto_score): self
    {
        $this->auto_score = $auto_score;

        return $this;
    }

    /**
     * Get solution to which grade is related.
     *
     * @return Solution|null
     */
    public function getSolution(): ?Solution
    {
        return $this->solution;
    }

    /**
     * Get solution to which grade is related.
     *
     * @param Solution|null $solution
     * @return $this
     */
    public function setSolution(?Solution $solution): self
    {
        // unset the owning side of the relation if necessary
        if ($solution === null && $this->solution !== null) {
            $this->solution->setGrade(null);
        }

        // set the owning side of the relation if necessary
        if ($solution !== null && $solution->getGrade() !== $this) {
            $solution->setGrade($this);
        }

        $this->solution = $solution;

        return $this;
    }
}
