<?php

namespace App\GraphQL\Mutation;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;
use App\Entity\Section;
use App\Entity\Course;
use Overblog\GraphQLBundle\Definition\Argument;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SectionMutation implements MutationInterface, AliasedInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createSection(Argument $args): Section
    {
        $params = $args->getArrayCopy();
        extract($params);

        $course = $this->em->getRepository(Course::class)->findOneById($courseId);

        $section = new Section();
        $section->setName($name);
        if (isset($sort)) {
            $section->setSort($sort);
        }
        $section->setCourse($course);
        $this->em->persist($section);
        $this->em->flush();

        return $section;
    }

    public function updateSection(Argument $args): Section
    {
        $params = $args->getArrayCopy();
        extract($params);

        $section = $this->em->getRepository(Section::class)->findOneById($id);

        if (!$section) {
            throw new NotFoundHttpException("Section not found");
        }

        if (isset($name)) {
            $section->setName($name);
        }

        if (isset($sort)) {
            $section->setSort($sort);
        }

        if (isset($courseId)) {
            $course = $this->em->getRepository(Course::class)->findOneById($courseId);
            $section->setCourse($course);
        }

        $this->em->flush();

        return $section;
    }

    public function deleteSection(Argument $args): Int
    {
        $params = $args->getArrayCopy();
        extract($params);

        $section = $this->em->getRepository(Section::class)->findOneById($id);

        if (!$section) {
            throw new NotFoundHttpException("Section not found");
        }

        $this->em->remove($section);
        $this->em->flush();

        return $id;
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return [
            'createSection' => 'create_section',
            'updateSection' => 'update_section',
            'deleteSection' => 'delete_section'
        ];
    }
}
