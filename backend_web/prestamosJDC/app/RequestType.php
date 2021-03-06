<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    protected $table = 'request_types';
    protected $fillable = [
        'name'
    ];

    public function requests(){
        return $this->hasMany('App\Request');
    }
}
