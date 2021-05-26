<?php

namespace App\Entity;

use App\Repository\SolutionStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents current status of solution in the system.
 *
 * @ORM\Entity(repositoryClass=SolutionStatusRepository::class)
 * @ORM\Table(name="solution_statuses")
 */
class SolutionStatus
{
    /**
     * Unique solution status identifier.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Informational string code of status.
     *
     * @ORM\Column(type="string", length=64)
     *
     * @todo - limit possible values to specific statuses
     */
    private $status;

    /**
     * Solutions having specific status.
     *
     * @ORM\OneToMany(targetEntity=Solution::class, mappedBy="status")
     */
    private $solutions;

    /**
     * SolutionStatus constructor.
     */
    public function __construct()
    {
        $this->solutions = new ArrayCollection();
    }

    /**
     * Get unique solution status identifier.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get status of solution status.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Set solution status name.
     *
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get solutions having specific status
     *
     * @return Collection|Solution[]
     */
    public function getSolutions(): Collection
    {
        return $this->solutions;
    }

    /**
     * Add solution to specific solution status.
     *
     * @param Solution $solution
     * @return $this
     */
    public function addSolution(Solution $solution): self
    {
        if (!$this->solutions->contains($solution)) {
            $this->solutions[] = $solution;
            $solution->setStatus($this);
        }

        return $this;
    }

    /**
     * Remove solution from solutions with specific status.
     *
     * @param Solution $solution
     * @return $this
     */
    public function removeSolution(Solution $solution): self
    {
        if ($this->solutions->removeElement($solution)) {
            // set the owning side to null (unless already changed)
            if ($solution->getStatus() === $this) {
                $solution->setStatus(null);
            }
        }

        return $this;
    }
}
