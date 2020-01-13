<?php
namespace App\GraphQL\Resolver;

use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Utils;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Resolver\ResolverMap;
use Overblog\GraphQLBundle\Resolver\ResolverResolver;
use Overblog\GraphQLBundle\Resolver\MutationResolver;
use App\GraphQL\Mutation\SectionMutation;
use App\GraphQL\Mutation\CourseMutation;

class MyResolverMap extends ResolverMap
{
    private $resolverResolver;
    private $mutationResolver;

    public function __construct(ResolverResolver $resolverResolver, MutationResolver $mutationResolver)
    {
        $this->resolverResolver = $resolverResolver;
        $this->mutationResolver = $mutationResolver;
    }

    public function map()
    {
        return [
            'Query' => [
                'course' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->resolverResolver->resolve([CourseResolver::class, [$args]]);
                }
            ],
            'Mutation' => [
                'createCourse' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\CourseMutation::createCourse', [$args]]);
                },
                'updateCourse' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\CourseMutation::updateCourse', [$args]]);
                },
                'deleteCourse' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\CourseMutation::deleteCourse', [$args]]);
                },
                'createSection' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\SectionMutation::createSection', [$args]]);
                },
                'updateSection' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\SectionMutation::updateSection', [$args]]);
                },
                'deleteSection' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\SectionMutation::deleteSection', [$args]]);
                },
                'createLesson' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\LessonMutation::createLesson', [$args]]);
                },
                'updateLesson' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\LessonMutation::updateLesson', [$args]]);
                },
                'deleteLesson' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->mutationResolver->resolve(['App\GraphQL\Mutation\LessonMutation::deleteLesson', [$args]]);
                },
            ]
        ];
    }
}
