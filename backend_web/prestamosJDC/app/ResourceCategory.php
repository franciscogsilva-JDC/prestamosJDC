<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceCategory extends Model
{
    protected $table = 'resource_categories';
    protected $fillable = [
        'name'
    ];

    public function resources(){
        return $this->hasMany('App\Resource');
    }
}
