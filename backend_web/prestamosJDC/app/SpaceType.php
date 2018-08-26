<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaceType extends Model
{
    protected $table = 'space_types';
    protected $fillable = [
        'name'
    ];

    public function spaces(){
        return $this->hasMany('App\Space');
    }
}
