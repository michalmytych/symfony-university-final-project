<?php

namespace App\Entity;

use App\Repository\SolutionRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents solution provided by user to specific problem.
 *
 * @ORM\Entity(repositoryClass=SolutionRepository::class)
 */
class Solution
{
    /**
     * Unique solution identifier.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Datetime when solution was submitted and saved in system.
     *
     * @ORM\Column(type="datetime")
     */
    private $submitted_at;

    /**
     * Problem to which solution was provided.
     *
     * @ORM\ManyToOne(targetEntity=Problem::class, inversedBy="solutions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $problem;

    /**
     * Grade related to solution (added by teacher-type user).
     *
     * @ORM\OneToOne(targetEntity=Grade::class, inversedBy="solution", cascade={"persist", "remove"})
     */
    private $grade;

    /**
     * Coding language chosen by user in solution.
     *
     * @ORM\ManyToOne(targetEntity=CodeLanguage::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $code_language;

    /**
     * Current status of solution in the system.
     *
     * @ORM\ManyToOne(targetEntity=SolutionStatus::class, inversedBy="solutions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * Get unique solution identifier.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get datetime when solution was submitted and saved in the system.
     *
     * @return DateTimeInterface|null
     */
    public function getSubmittedAt(): ?DateTimeInterface
    {
        return $this->submitted_at;
    }

    /**
     * Set datetime when solution was submitted and saved in the system.
     *
     * @param DateTimeInterface $submitted_at
     * @return $this
     */
    public function setSubmittedAt(DateTimeInterface $submitted_at): self
    {
        $this->submitted_at = $submitted_at;

        return $this;
    }

    /**
     * Get problem related to solution (to which solution was provided).
     *
     * @return Problem|null
     */
    public function getProblem(): ?Problem
    {
        return $this->problem;
    }

    /**
     * Set problem to which solution is related.
     *
     * @param Problem|null $problem
     * @return $this
     */
    public function setProblem(?Problem $problem): self
    {
        $this->problem = $problem;

        return $this;
    }

    /**
     * Get grade of solution.
     *
     * @return Grade|null
     */
    public function getGrade(): ?Grade
    {
        return $this->grade;
    }

    /**
     * Set grade of solution.
     *
     * @param Grade|null $grade
     * @return $this
     */
    public function setGrade(?Grade $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get coding language related to solution (language which was chosen in solution).
     *
     * @return CodeLanguage|null
     */
    public function getCodeLanguage(): ?CodeLanguage
    {
        return $this->code_language;
    }

    /**
     * Set coding language related to solution (language which was chosen in solution).
     *
     * @param CodeLanguage|null $code_language
     * @return $this
     */
    public function setCodeLanguage(?CodeLanguage $code_language): self
    {
        $this->code_language = $code_language;

        return $this;
    }

    /**
     * Get current status of solution.
     *
     * @return SolutionStatus|null
     */
    public function getStatus(): ?SolutionStatus
    {
        return $this->status;
    }

    /**
     * Set current status of solution (must be limited to specific values)
     *
     * @param SolutionStatus|null $status
     * @return $this
     */
    public function setStatus(?SolutionStatus $status): self
    {
        /**
         * @todo - limit possible values to specific statuses
         */
        $this->status = $status;

        return $this;
    }
}

