<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class PigType extends BaseType
{
    protected $attributes = [
        'name' => 'PigType',
        'description' => 'A Pig type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the pig'
            ],
			'name' => [
				'type' => Type::string(),
				'description' => 'The name of pig'
            ],
			'code' => [
				'type' => Type::string(),
				'description' => 'The code of pig'
            ],
        ];
    }
}
