<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DniType extends Model
{
    protected $table = 'dni_types';
    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}
