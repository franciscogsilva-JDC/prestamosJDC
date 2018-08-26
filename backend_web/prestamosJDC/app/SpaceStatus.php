<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpaceStatus extends Model
{
    protected $table = 'space_statuses';
    protected $fillable = [
        'name'
    ];

    public function spaces(){
        return $this->hasMany('App\Space');
    }
}
