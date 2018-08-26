<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependency extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'dependencies';
    protected $fillable = [
        'name',
        'headquarter_id',
        'email'
    ];

    public function headquarter(){
        return $this->belongsTo('App\Headquarter', 'headquarter_id');
    }

    public function programs(){
        return $this->hasMany('App\Program');
    }

    public function resources(){
        return $this->hasMany('App\Resource');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function attendants(){
        return $this->belongsToMany('App\User', 'dependencies_has_users', 'dependency_id', 'attendant_id')
            ->withTimestamps();
    }
}
