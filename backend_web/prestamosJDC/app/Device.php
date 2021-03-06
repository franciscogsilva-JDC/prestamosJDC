<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    protected $fillable = [
    	'push_token',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}