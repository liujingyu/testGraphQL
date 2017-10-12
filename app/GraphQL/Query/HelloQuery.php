<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class HelloQuery extends Query
{
    protected $attributes = [
        'name' => 'HelloQuery',
        'description' => 'A Hello query'
    ];

    public function type()
    {
        return Type::string();
    }

    public function args()
    {
        return [
            //'hello' => ['name' => 'hello', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return "Hello world!";
    }
}
