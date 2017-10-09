<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pig extends Model
{
    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function setBirthAttribute($value)
    {
        $this->attributes['birth'] = date('Y-m-d H:i:s', strtotime($value));
    }

}
