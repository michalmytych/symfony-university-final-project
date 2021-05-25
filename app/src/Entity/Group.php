<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents group of users for which posts or problems are published.
 *
 * @ORM\Entity(repositoryClass=GroupRepository::class)
 * @ORM\Table(name="`groups`")
 */
class Group
{
    /**
     * Unique group identifier.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Group name.
     *
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * Group description.
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * Datetime when group was created.
     *
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * Problems related to group.
     *
     * @ORM\ManyToMany(targetEntity=Problem::class, mappedBy="groups")
     */
    private $problems;

    /**
     * Courses related to group.
     *
     * @ORM\ManyToMany(targetEntity=Course::class, mappedBy="groups")
     */
    private $courses;

    /**
     * Posts related to group.
     *
     * @ORM\ManyToMany(targetEntity=Post::class, inversedBy="groups")
     */
    private $posts;

    /**
     * Group constructor.
     */
    public function __construct()
    {
        $this->problems = new ArrayCollection();
        $this->courses = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    /**
     * Get unique group identifier.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get group name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set group name.
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
     * Get group description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set group description.
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
     * Get datetime when group was created.
     *
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * Set datetime when group was created.
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
     * Get problems related to group.
     *
     * @return Collection|Problem[]
     */
    public function getProblems(): Collection
    {
        return $this->problems;
    }

    /**
     * Add relation with problem to group.
     *
     * @param Problem $problem
     * @return $this
     */
    public function addProblem(Problem $problem): self
    {
        if (!$this->problems->contains($problem)) {
            $this->problems[] = $problem;
            $problem->addGroup($this);
        }

        return $this;
    }

    /**
     * Remove relation to problem from group.
     *
     * @param Problem $problem
     * @return $this
     */
    public function removeProblem(Problem $problem): self
    {
        if ($this->problems->removeElement($problem)) {
            $problem->removeGroup($this);
        }

        return $this;
    }

    /**
     * Get courses related to group.
     *
     * @return Collection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    /**
     * Add course relation to group.
     *
     * @param Course $course
     * @return $this
     */
    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->addGroup($this);
        }

        return $this;
    }

    /**
     * Remove course relation from group.
     *
     * @param Course $course
     * @return $this
     */
    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            $course->removeGroup($this);
        }

        return $this;
    }

    /**
     * Get posts related to group.
     *
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * Add post relation to group.
     *
     * @param Post $post
     * @return $this
     */
    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
        }

        return $this;
    }

    /**
     * Remove post from group.
     *
     * @param Post $post
     * @return $this
     */
    public function removePost(Post $post): self
    {
        $this->posts->removeElement($post);

        return $this;
    }
}
