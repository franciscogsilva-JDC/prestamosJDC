<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'buildings';
    protected $fillable = [
        'name',
        'headquarter_id'
    ];

    public function headquarter(){
        return $this->belongsTo('App\Headquarter', 'headquarter_id');
    }

    public function spaces(){
        return $this->hasMany('App\Space');
    }
}
