<?php
// app/GraphQL/Enums/EpisodeEnum.php
namespace App\GraphQL\Enums;

use Folklore\GraphQL\Support\Type as GraphQLType;

class EpisodeEnum extends GraphQLType {
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'Episode',
        'description' => 'The types of demographic elements',
        'values' => [
            'NEWHOPE' => 'NEWHOPE',
            'EMPIRE' => 'EMPIRE',
            'JEDI' => 'JEDI',
        ],
    ];
}
