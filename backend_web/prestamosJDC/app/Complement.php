<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complement extends Model
{
    protected $table = 'complements';
    protected $fillable = [
        'name'
    ];

    public function resources(){
        return $this->belongsToMany('App\Resource', 'complements_has_resources', 'complement_id', 'resource_id')
            ->withTimestamps();
    }
}
