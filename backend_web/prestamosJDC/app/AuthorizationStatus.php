<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorizationStatus extends Model
{
    protected $table = 'authorization_statuses';
    protected $fillable = [
        'name'
    ];

    public function authorizations(){
        return $this->hasMany('App\Authorization');
    }
}
