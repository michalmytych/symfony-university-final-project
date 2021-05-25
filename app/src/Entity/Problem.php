<?php

namespace App\Entity;

use App\Repository\ProblemRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents coding problem added by teacher-type user.
 *
 * @ORM\Entity(repositoryClass=ProblemRepository::class)
 * @ORM\Table(name="problems")
 */
class Problem
{
    /**
     * Unique problem identifier.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Datetime when problem was created.
     *
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * Description of problem.
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * Tests (inputs + valid outputs sets) for problem.
     *
     * @ORM\Column(type="json")
     */
    private $tests = [];

    /**
     * Title of problem.
     *
     * @ORM\Column(type="string", length=128)
     */
    private $title;

    /**
     * Available coding languages for use in problem solution.
     *
     * @ORM\ManyToMany(targetEntity=CodeLanguage::class)
     */
    private $code_languages;

    /**
     * Solutions of problem provided by users.
     *
     * @ORM\OneToMany(targetEntity=Solution::class, mappedBy="problem", orphanRemoval=true)
     */
    private $solutions;

    /**
     * Groups related to problem.
     *
     * @ORM\ManyToMany(targetEntity=Group::class, inversedBy="problems")
     */
    private $groups;

    /**
     * Problem constructor.
     */
    public function __construct()
    {
        $this->code_languages = new ArrayCollection();
        $this->solutions = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    /**
     * Get unique problem identifier.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get datetime when problem was created.
     *
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * Set datetime when problem was created.
     *
     * @param DateTimeInterface $created_at
     * @return $this
     */
    public function setCreatedAt(DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get description of problem.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set description of problem.
     *
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get tests for problem.
     *
     * @return array|null
     */
    public function getTests(): ?array
    {
        return $this->tests;
    }

    /**
     * Set tests for problem.
     *
     * @param array $tests
     * @return $this
     */
    public function setTests(array $tests): self
    {
        $this->tests = $tests;

        return $this;
    }

    /**
     * Get title of problem.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set title of problem.
     *
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get coding languages related to problem (available in solution).
     *
     * @return Collection|CodeLanguage[]
     */
    public function getCodeLanguages(): Collection
    {
        return $this->code_languages;
    }

    /**
     * Add new available coding language to problem.
     *
     * @param CodeLanguage $codeLanguage
     * @return $this
     */
    public function addCodeLanguage(CodeLanguage $codeLanguage): self
    {
        if (!$this->code_languages->contains($codeLanguage)) {
            $this->code_languages[] = $codeLanguage;
        }

        return $this;
    }

    /**
     * Remove coding language relation from problem.
     *
     * @param CodeLanguage $codeLanguage
     * @return $this
     */
    public function removeCodeLanguage(CodeLanguage $codeLanguage): self
    {
        $this->code_languages->removeElement($codeLanguage);

        return $this;
    }

    /**
     * Get solutions related to problem (solutions provided by users for the problem).
     *
     * @return Collection|Solution[]
     */
    public function getSolutions(): Collection
    {
        return $this->solutions;
    }

    /**
     * Add new solution to problem.
     *
     * @param Solution $solution
     * @return $this
     */
    public function addSolution(Solution $solution): self
    {
        if (!$this->solutions->contains($solution)) {
            $this->solutions[] = $solution;
            $solution->setProblem($this);
        }

        return $this;
    }

    /**
     * Remove solution from problem.
     *
     * @param Solution $solution
     * @return $this
     */
    public function removeSolution(Solution $solution): self
    {
        if ($this->solutions->removeElement($solution)) {
            // set the owning side to null (unless already changed)
            if ($solution->getProblem() === $this) {
                $solution->setProblem(null);
            }
        }

        return $this;
    }

    /**
     * Get groups related to problem.
     *
     * @return Collection|Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    /**
     * Add group related to problem.
     *
     * @param Group $group
     * @return $this
     */
    public function addGroup(Group $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
        }

        return $this;
    }

    /**
     * Remove group relation from problem.
     *
     * @param Group $group
     * @return $this
     */
    public function removeGroup(Group $group): self
    {
        $this->groups->removeElement($group);

        return $this;
    }
}
