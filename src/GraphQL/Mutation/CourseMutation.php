<?php

namespace App\GraphQL\Mutation;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;
use App\Entity\Course;
use Overblog\GraphQLBundle\Definition\Argument;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseMutation implements MutationInterface, AliasedInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createCourse(Argument $args): Course
    {
        $params = $args->getArrayCopy();
        extract($params);

        $course = new Course();
        $course->setName($name);

        if (isset($slug)) {
            $course->setSlug($slug);
        }

        if (isset($progress)) {
            $course->setProgress($progress);
        }
        $this->em->persist($course);
        $this->em->flush();

        return $course;
    }

    public function updateCourse(Argument $args): Course
    {
        $params = $args->getArrayCopy();
        extract($params);

        $course = $this->em->getRepository(Course::class)->findOneById($id);

        if (!$course) {
            throw new NotFoundHttpException("Course not found");
        }

        if (isset($name)) {
            $course->setName($name);
        }

        if (isset($slug)) {
            $course->setSlug($slug);
        }

        if (isset($progress)) {
            $course->setProgress($progress);
        }

        $this->em->flush();

        return $course;
    }

    public function deleteCourse(Argument $args): Int
    {
        $params = $args->getArrayCopy();
        extract($params);

        $course = $this->em->getRepository(Course::class)->findOneById($id);

        if (!$course) {
            throw new NotFoundHttpException("Course not found");
        }

        $this->em->remove($course);
        $this->em->flush();

        return $id;
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'createCourse' => 'create_course',
            'updateCourse' => 'update_course',
            'deleteCourse' => 'delete_course'
        ];
    }
}
