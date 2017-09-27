<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class ProfileType extends BaseType
{
    protected $attributes = [
        'name' => 'ProfileType',
        'description' => 'A user profile type'
    ];

    public function fields()
    {
        return [
            'age' => [
                'type' => Type::string(),
                'description' => 'The age of user'
            ]

        ];
    }
}
