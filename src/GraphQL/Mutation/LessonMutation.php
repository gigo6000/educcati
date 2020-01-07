<?php

namespace App\GraphQL\Mutation;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;
use App\Entity\Section;
use App\Entity\Lesson;
use Overblog\GraphQLBundle\Definition\Argument;
use Doctrine\ORM\EntityManagerInterface;

class LessonMutation implements MutationInterface, AliasedInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createLesson(Argument $args): Section
    {
        $params = $args->getArrayCopy();
        extract($params);

        $section = $this->em->getRepository(Section::class)->findOneById($sectionId);

        $lesson = new Lesson();
        $lesson->setName($name);
        if (isset($sort)) {
            $lesson->setSort($sort);
        }

        if (isset($slug)) {
            $lesson->setSlug($slug);
        }

        if (isset($videoUrl)) {
            $lesson->setVideoUrl($videoUrl);
        }

        if (isset($duration)) {
            $lesson->setDuration($duration);
        }

        $lesson->setSection($section);
        $this->em->persist($lesson);
        $this->em->flush();

        return $lesson;
    }

    public function updateLesson(Argument $args)
    {
        $params = $args->getArrayCopy();
        extract($params);

        $lesson = $this->em->getRepository(Lesson::class)->findOneById($id);

        if (isset($name)) {
            $lesson->setName($name);
        }

        if (isset($sort)) {
            $lesson->setSort($sort);
        }

        if (isset($slug)) {
            $lesson->setSlug($slug);
        }

        if (isset($videoUrl)) {
            $lesson->setVideoUrl($videoUrl);
        }

        if (isset($duration)) {
            $lesson->setDuration($duration);
        }

        if (isset($sectionId)) {
            $section = $this->em->getRepository(Section::class)->findOneById($sectionId);
            $lesson->setSection($section);
        }

        $this->em->flush();

        return $lesson;
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'createLesson' => 'create_lesson',
            'updateLesson' => 'update_lesson'
        ];
    }
}
