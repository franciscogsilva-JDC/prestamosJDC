<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'dni',
        'cellphone_number',
        'user_type_id',
        'user_status_id',
        'dni_type_id',
        'gender_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function approvedRequests(){
        return $this->hasMany('App\Authorization', 'approved_by');
    }

    public function receivedRequests(){
        return $this->hasMany('App\Authorization', 'received_by');
    }

    public function town(){
        return $this->belongsTo('App\Town', 'town_id');
    }

    public function dependency(){
        return $this->belongsTo('App\Dependency', 'dependency_id');
    }

    public function attendedDependencies(){
        return $this->belongsToMany('App\Dependency', 'dependencies_has_users', 'attendant_id', 'dependency_id')
            ->withTimestamps();
    }

    public function devices(){
        return $this->hasMany('App\Device');
    }

    public function dniType(){
        return $this->belongsTo('App\DniType', 'dni_type_id');
    }

    public function gender(){
        return $this->belongsTo('App\Gender', 'gender_id');
    }

    public function requests(){
        return $this->hasMany('App\Request', 'user_id');
    }

    public function responsibleRequests(){
        return $this->hasMany('App\Request', 'responsible_id');
    }

    public function resources(){
        return $this->belongsToMany('App\Resource', 'resources_has_users', 'user_id', 'resource_id')
            ->withTimestamps();
    }

    public function status(){
        return $this->belongsTo('App\UserStatus', 'user_status_id');
    }

    public function type(){
        return $this->belongsTo('App\UserType', 'user_type_id');
    }
    
    public function updateLoginDate(){
        $this->logged_at = Carbon::now();
        $this->save();
    }

    public function isAdmin(){
        return $this->type->name === 'Administrador';
    }
}
