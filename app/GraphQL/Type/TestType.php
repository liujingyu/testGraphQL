<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class TestType extends BaseType
{
    protected $attributes = [
        'name' => 'TestType',
        'description' => 'A Type type'
    ];

    public function fields()
    {
        return [
            'type' => [
                'type' => GraphQL::type('TestEnum')
            ]
        ];
    }
}
