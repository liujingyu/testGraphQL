<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Pig;

class UpdatePigMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdatePigMutation',
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
                'rules' => ['required', 'exists:pigs,code']
            ],
            'birth' => [
                'name' => 'birth',
                'type' => Type::string(),
                'rules' => ['required', 'date']
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
		$pig = Pig::where('code', $args['code'])->first();

		$pig->code = $args['code'];
		$pig->name = $args['name'];
		$pig->birth = $args['birth'];
		$pig->save();

		return $pig;
    }
}
