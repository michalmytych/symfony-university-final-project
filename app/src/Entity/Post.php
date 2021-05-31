<?php

namespace App\Entity;

use App\Repository\PostRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

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
    private $textContent;

    /**
     * Datetime when post was created.
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * Title of post.
     *
     * @ORM\Column(type="string", length=128)
     * @Assert\Type(type="string")
     * @Assert\Length(min="3", max="128")
     */
    private $title;

    /**
     * Courses related to post.
     *
     * @ORM\ManyToMany(targetEntity=Course::class, mappedBy="posts", fetch="EXTRA_LAZY")
     */
    private $courses;

    /**
     * Groups related to post.
     *
     * @ORM\ManyToMany(targetEntity=Group::class, mappedBy="posts")
     */
    private $groups;

    /**
     * Datetime when title or textContent field were changed.
     *
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="change", field={"title", "textContent"})
     */
    private $changedAt;

    /**
     * Post constructor.
     */
    public function __construct()
    {
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
        return $this->textContent;
    }

    /**
     * Set text content of post.
     *
     * @param string $textContent
     * @return $this
     */
    public function setTextContent(string $textContent): self
    {
        $this->textContent = $textContent;

        return $this;
    }

    /**
     * Get datetime when post was created.
     *
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Set datetime when post was created.
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
     * Get datetime when title or textContent field were changed.
     *
     * @return DateTimeInterface|null
     */
    public function getChangedAt(): ?\DateTimeInterface
    {
        return $this->changedAt;
    }

    /**
     * Set datetime when title or textContent field were changed.
     *
     * @param DateTimeInterface $changedAt
     * @return $this
     */
    public function setChangedAt(\DateTimeInterface $changedAt): self
    {
        $this->changedAt = $changedAt;

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
