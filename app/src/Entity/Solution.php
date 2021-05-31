<?php

namespace App\Entity;

use App\Repository\SolutionRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents solution provided by user to specific problem.
 *
 * @ORM\Entity(repositoryClass=SolutionRepository::class)
 * @ORM\Table(name="solutions")
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
    private $submittedAt;

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
    private $codeLanguage;

    /**
     * Current status of solution in the system.
     *
     * @ORM\ManyToOne(targetEntity=SolutionStatus::class, inversedBy="solutions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    /**
     * Past statuses of solution.
     *
     * @ORM\ManyToMany(targetEntity=SolutionStatus::class)
     */
    private $pastStatuses;

    /**
     * Solution constructor.
     */
    public function __construct()
    {
        $this->pastStatuses = new ArrayCollection();
    }

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
        return $this->submittedAt;
    }

    /**
     * Set datetime when solution was submitted and saved in the system.
     *
     * @param DateTimeInterface $submittedAt
     * @return $this
     */
    public function setSubmittedAt(DateTimeInterface $submittedAt): self
    {
        $this->submittedAt = $submittedAt;

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
        return $this->codeLanguage;
    }

    /**
     * Set coding language related to solution (language which was chosen in solution).
     *
     * @param CodeLanguage|null $codeLanguage
     * @return $this
     */
    public function setCodeLanguage(?CodeLanguage $codeLanguage): self
    {
        $this->codeLanguage = $codeLanguage;

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

    /**
     * Get past statuses of solution.
     *
     * @return Collection|SolutionStatus[]
     */
    public function getPastStatuses(): Collection
    {
        return $this->pastStatuses;
    }

    /**
     * Add past status to solution.
     *
     * @param SolutionStatus $pastStatus
     * @return $this
     */
    public function addPastStatus(SolutionStatus $pastStatus): self
    {
        if (!$this->pastStatuses->contains($pastStatus)) {
            $this->pastStatuses[] = $pastStatus;
        }

        return $this;
    }

    /**
     * Remove past status from solution.
     *
     * @param SolutionStatus $pastStatus
     * @return $this
     */
    public function removePastStatus(SolutionStatus $pastStatus): self
    {
        $this->pastStatuses->removeElement($pastStatus);

        return $this;
    }
}

