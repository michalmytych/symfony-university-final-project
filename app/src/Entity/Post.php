<?php

namespace App\Entity;

use App\Repository\PostRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents social network-like post added by user to specific course or group.
 *
 * @ORM\Entity(repositoryClass=PostRepository::class)
 * @ORM\Table(name="posts")
 */
class Post
{
    /**
     * Unique post identifier.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Post text content.
     *
     * @ORM\Column(type="string", length=512)
     */
    private $text_content;

    /**
     * Datetime when post was created.
     *
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * Title of post.
     *
     * @ORM\Column(type="string", length=128)
     */
    private $title;

    /**
     * Courses related to post.
     *
     * @ORM\ManyToMany(targetEntity=Course::class, mappedBy="posts")
     */
    private $courses;

    /**
     * Groups related to post.
     *
     * @ORM\ManyToMany(targetEntity=Group::class, mappedBy="posts")
     */
    private $groups;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->courses = new ArrayCollection();
        $this->groups = new ArrayCollection();
    }

    /**
     * Get unique identifier of post.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get text content of post.
     *
     * @return string|null
     */
    public function getTextContent(): ?string
    {
        return $this->text_content;
    }

    /**
     * Set text content of post.
     *
     * @param string $text_content
     * @return $this
     */
    public function setTextContent(string $text_content): self
    {
        $this->text_content = $text_content;

        return $this;
    }

    /**
     * Get datetime when post was created.
     *
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * Set datetime when post was created.
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
     * Get title of post.
     *
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set title of post.
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
     * Get courses related to post.
     *
     * @return Collection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    /**
     * Add course relation to post.
     *
     * @param Course $course
     * @return $this
     */
    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->addPost($this);
        }

        return $this;
    }

    /**
     * Remove course relation from post.
     *
     * @param Course $course
     * @return $this
     */
    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            $course->removePost($this);
        }

        return $this;
    }

    /**
     * Get groups related to post.
     *
     * @return Collection|Group[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    /**
     * Add group relation to post.
     *
     * @param Group $group
     * @return $this
     */
    public function addGroup(Group $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
            $group->addPost($this);
        }

        return $this;
    }

    /**
     * Remove group relation from post.
     *
     * @param Group $group
     * @return $this
     */
    public function removeGroup(Group $group): self
    {
        if ($this->groups->removeElement($group)) {
            $group->removePost($this);
        }

        return $this;
    }
}
