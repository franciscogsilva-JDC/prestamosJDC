<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceType extends Model
{
    protected $table = 'resource_types';
    protected $fillable = [
        'name'
    ];

    public function resources(){
        return $this->hasMany('App\Resource');
    }
}
