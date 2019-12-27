<?php
namespace App\Resolver;

use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Utils;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Resolver\ResolverMap;
use Overblog\GraphQLBundle\Resolver\ResolverResolver;


class MyResolverMap extends ResolverMap
{
    private $resolver;

    public function __construct(ResolverResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function map()
    {
        return [
            'Query' => [
                'course' => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    return $this->resolver->resolve([CourseResolver::class, [$args]]);
                }
            ],
        ];
    }
}
