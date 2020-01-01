<?php

namespace App\GraphQL\Resolver;

use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use App\Entity\Course;
use Doctrine\ORM\EntityManagerInterface;

class CourseResolver implements ResolverInterface, AliasedInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(Argument $args)
    {
        return $this->em->getRepository(Course::class)->findOneBy($args->getArrayCopy());
    }

    /**
     * {@inheritdoc}
     */
    public static function getAliases(): array
    {
        return ['getCourse' => 'get_course'];
    }
}
