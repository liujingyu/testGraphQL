<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pig;

class PigQuery extends Query
{
    protected $attributes = [
        'name' => 'PigQuery',
        'description' => 'A query'
    ];

	public function type()
	{
		return Type::listOf(GraphQL::type('Pig'));
	}

	public function args()
	{
		return [
			'id' => ['name' => 'id', 'type' => Type::string()],
			'name' => ['name' => 'name', 'type' => Type::string()],
			'code' => ['name' => 'code', 'type' => Type::string()],
		];
	}

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $fields = $info->getFieldSelection($depth = 3);

        $pigs = Pig::query();

        return $pigs->get();
    }
}
