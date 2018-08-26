<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';
    protected $fillable = [
        'departament_id',
        'name'
    ];

    public function departament(){
        return $this->belongsTo('App\Departament', 'departament_id');
    }

    public function headquarters(){
        return $this->hasMany('App\Headquarter');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}
