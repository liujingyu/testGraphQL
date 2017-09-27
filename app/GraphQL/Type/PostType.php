<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class PostType extends BaseType
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'A Post type'
    ];

    public function fields()
    {
        return [
            'id' => [
				'type' => Type::nonNull(Type::string()),
				'description' => 'The id of the post'
			],
			'title' => [
				'type' => Type::string(),
				'description' => 'The title of post'
            ],
            'body' => [
                'type' => Type::string(),
                'description' => 'The body the post'
            ]

        ];
    }
}
