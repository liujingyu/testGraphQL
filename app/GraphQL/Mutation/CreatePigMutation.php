<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pig;

class CreatePigMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreatePigMutation',
        'description' => 'A Pig mutation'
    ];

    public function type()
    {
        return GraphQL::type('Pig');
    }

    public function args()
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'code' => [
                'name' => 'code',
                'type' => Type::string(),
                'rules' => ['required', 'unique:pigs,code']
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $pig = Pig::create([
            'name' => $args['name'],
            'code' => $args['code'],
            'user_id' => 1,
        ]);

        return $pig;
    }
}
