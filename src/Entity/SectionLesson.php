<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionLessonRepository")
 */
class SectionLesson
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $lesson_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $section_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLessonId(): ?int
    {
        return $this->lesson_id;
    }

    public function setLessonId(int $lesson_id): self
    {
        $this->lesson_id = $lesson_id;

        return $this;
    }

    public function getSectionId(): ?int
    {
        return $this->section_id;
    }

    public function setSectionId(int $section_id): self
    {
        $this->section_id = $section_id;

        return $this;
    }
}
