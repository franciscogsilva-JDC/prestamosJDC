<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Headquarter extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'headquarters';
    protected $fillable = [
        'name',
        'address',
        'headquarter_id'
    ];

    public function buildings(){
        return $this->hasMany('App\Building');
    }

    public function town(){
        return $this->belongsTo('App\Town', 'town_id');
    }

    public function dependencies(){
        return $this->hasMany('App\Dependency');
    }

    public function spaces(){
        return $this->hasMany('App\Space');
    }
}
