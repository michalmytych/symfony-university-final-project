<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Represents course to which users and users groups are related
 * and for which posts or problems are published.
 *
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 * @ORM\Table(name="courses")
 */
class Course
{
    /**
     * Unique course identifier.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Course description.
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * Course name.
     *
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * Datetime when course was created.
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * Groups related to course.
     *
     * @ORM\ManyToMany(targetEntity=Group::class, inversedBy="courses")
     */
    private $groups;

    /**
     * Posts related to course.
     *
     * @ORM\ManyToMany(targetEntity=Post::class, inversedBy="courses")
     */
    private $posts;

    /**
     * Course constructor.
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    /**
     * Get unique course identifier.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get course description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set course description.
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
     * Get course name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set course name.
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
     * Get datetime when course was created.
     *
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Set datetime when course was created.
     *
     * @param DateTimeInterface $createdAt
     * @return $this
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set groups related to course.
     *
     * @return Collection|Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    /**
     * Add course relation with group.
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
     * Remove course relation with group.
     *
     * @param Group $group
     * @return $this
     */
    public function removeGroup(Group $group): self
    {
        $this->groups->removeElement($group);

        return $this;
    }

    /**
     * Get posts related to course.
     *
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * Add course relation to post.
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
     * Remove course relation to post.
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
