<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceStatus extends Model
{
    protected $table = 'resource_statuses';
    protected $fillable = [
        'name'
    ];

    public function resources(){
        return $this->hasMany('App\Resource');
    }
}
