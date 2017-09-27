<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;

class UsersQuery extends Query
{
	protected $attributes = [
		'name' => 'UsersQuery',
		'description' => 'A User query'
	];

	public function type()
	{
		return Type::listOf(GraphQL::type('User'));
	}

	public function args()
	{
		return [
			'id' => ['name' => 'id', 'type' => Type::string()],
			'email' => ['name' => 'email', 'type' => Type::string()],
		];
	}

	public function resolve($root, $args, $context, ResolveInfo $info)
    {
        //if (isset($args['id'])) {
            //return User::where('id' , $args['id'])->get();
        //} else if (isset($args['email'])) {
            //return User::where('email', $args['email'])->get();
        //} else {
            //return User::all();
        //}

        $fields = $info->getFieldSelection($depth = 3);

        $users = User::query();

        foreach ($fields as $field => $keys) {
            if ($field === 'profile') {
                $users->with('profile');
            }

            if ($field === 'posts') {
                $users->with('posts');
            }
        }

        return $users->get();
    }
}
