<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LessonRepository")
 */
class Lesson
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $video_url;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $duration;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_completed;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Section", inversedBy="lessons")
     */
    private $section;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TextTrack", mappedBy="lesson", orphanRemoval=true)
     */
    private $textTracks;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sort;

    public function __construct()
    {
        $this->textTracks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getVideoUrl(): ?string
    {
        return $this->video_url;
    }

    public function setVideoUrl(string $video_url): self
    {
        $this->video_url = $video_url;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getIsCompleted(): ?bool
    {
        return $this->is_completed;
    }

    public function setIsCompleted(bool $is_completed): self
    {
        $this->is_completed = $is_completed;

        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;

        return $this;
    }

    /**
     * @return Collection|TextTrack[]
     */
    public function getTextTracks(): Collection
    {
        return $this->textTracks;
    }

    public function addTextTrack(TextTrack $textTrack): self
    {
        if (!$this->textTracks->contains($textTrack)) {
            $this->textTracks[] = $textTrack;
            $textTrack->setLesson($this);
        }

        return $this;
    }

    public function removeTextTrack(TextTrack $textTrack): self
    {
        if ($this->textTracks->contains($textTrack)) {
            $this->textTracks->removeElement($textTrack);
            // set the owning side to null (unless already changed)
            if ($textTrack->getLesson() === $this) {
                $textTrack->setLesson(null);
            }
        }

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->sort;
    }

    public function setSort(?int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }
}
