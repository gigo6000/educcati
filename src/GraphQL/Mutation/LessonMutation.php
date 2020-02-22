<?php

namespace App\GraphQL\Mutation;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;
use App\Entity\Section;
use App\Entity\Lesson;
use Overblog\GraphQLBundle\Definition\Argument;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function createLesson(Argument $args): Lesson
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

        if (isset($isCompleted)) {
            $lesson->setIsCompleted($isCompleted);
        }

        if (isset($file)) {
            $lesson->setVideoUrl(json_encode($file));
        }

        $lesson->setSection($section);
        $this->em->persist($lesson);
        $this->em->flush();

        return $lesson;
    }

    public function updateLesson(Argument $args): Lesson
    {
        $params = $args->getArrayCopy();
        extract($params);

        $lesson = $this->em->getRepository(Lesson::class)->findOneById($id);

        if (!$lesson) {
            throw new NotFoundHttpException("Lesson not found");
        }

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

        if (isset($isCompleted)) {
            $lesson->setIsCompleted($isCompleted);
        }

        $this->em->flush();

        return $lesson;
    }

    public function deleteLesson(Argument $args): Int
    {
        $params = $args->getArrayCopy();
        extract($params);

        $lesson = $this->em->getRepository(Lesson::class)->findOneById($id);

        if (!$lesson) {
            throw new NotFoundHttpException("Lesson not found");
        }

        $this->em->remove($lesson);
        $this->em->flush();

        return $id;
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'createLesson' => 'create_lesson',
            'updateLesson' => 'update_lesson',
            'deleteLesson' => 'delete_lesson'
        ];
    }
}
