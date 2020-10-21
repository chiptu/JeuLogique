<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $table = 'Niveau';

    protected $primaryKey = 'Niveau_id';


    protected $attributes = [
        'levelJson' => '[]'
    ];

    protected $casts = [
        'levelJson' => 'json',
    ];


    public function metadata($key)
    {
        return Arr::get($this->metadata, $key);
    }
}
