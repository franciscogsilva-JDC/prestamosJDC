<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhysicalState extends Model
{
    protected $table = 'physical_states';
    protected $fillable = [
        'name'
    ];

    public function resources(){
        return $this->hasMany('App\Resource');
    }
}
