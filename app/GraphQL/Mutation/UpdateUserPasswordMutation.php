<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;

class UpdateUserPasswordMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UpdateUserPasswordMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string(),
                'rules' => ['required']
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
                'rules' => ['required', 'email']
            ]
        ];
    }

	public function rules()
	{
		return [
			'id' => ['required'],
			'email' => ['required', 'email']
		];
	}

    public function resolve($root, $args, $context, ResolveInfo $info)
	{
		$user = User::find($args['id']);
		if(!$user)
		{
			return null;
		}

		$user->password = bcrypt($args['password']);
		$user->save();

		return $user;
	}
}
