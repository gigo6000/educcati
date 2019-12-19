<?php
namespace App\Resolver;

use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Utils;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Resolver\ResolverMap;

class MyResolverMap extends ResolverMap
{
    public function map()
    {
        return [
            'Query' => [
                self::RESOLVE_FIELD => function ($value, Argument $args, \ArrayObject $context, ResolveInfo $info) {
                    if ('course' === $info->fieldName) {
                        $courses = Courses::getCourses();
                        $id = (int) $args['id'];
                        if (isset($courses[$id])) {
                            return $courses[$id];
                        }
                    }
                    return null;
                },
            ],
        ];
    }
}
