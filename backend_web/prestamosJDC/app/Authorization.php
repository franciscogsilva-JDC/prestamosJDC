<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authorization extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'authorizations';
    protected $fillable = [
        'request_id',
        'authorization_status_id'
    ];

    public function request(){
        return $this->belongsTo('App\Request', 'request_id');
    }

    public function status(){
        return $this->belongsTo('App\AuthorizationStatus', 'authorization_status_id');
    }

    public function approver(){
        return $this->belongsTo('App\User', 'approved_by');
    }

    public function receiver(){
        return $this->belongsTo('App\User', 'received_by');
    }

    public function resources(){
        return $this->belongsToMany('App\Resource', 'authorizations_has_resources', 'authorization_id', 'resource_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function spaces(){
        return $this->belongsToMany('App\Space', 'authorizations_has_spaces', 'authorization_id', 'space_id')
            ->withTimestamps();
    }
}
