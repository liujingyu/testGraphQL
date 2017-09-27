<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;
use App\GraphQL\Fields\PictureField;

class UserType extends BaseType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'posts' => [
                'args' => [
                    'id' => [
                        'type'        => Type::string(),
                        'description' => 'id of the post',
                    ],
                ],
                'type'        => Type::listOf(GraphQL::type('Post')),
                'description' => 'post description',
            ],
            'profile' => [
                'type' => GraphQL::type('Profile'),
                'description' => 'The user profile',
            ],
            //Instead of passing an array, you pass a class path to your custom field
            'picture' => PictureField::class
        ];
    }

    // If you want to resolve the field yourself, you can declare a method
    //  // with the following format resolve[FIELD_NAME]Field()
    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }

    public function resolvePostsField($root, $args)
    {
        if (isset($args['id'])) {
            return  $root->posts->where('id', $args['id']);
        }

        return $root->posts;
    }
}
