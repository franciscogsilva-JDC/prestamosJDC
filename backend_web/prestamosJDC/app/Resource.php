<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'resources';
    protected $fillable = [
        'name',
        'resource_type_id',
        'dependency_id',
        'resource_category_id',
        'physical_state_id',
        'resource_status_id'
    ];

    public function complements(){
        return $this->belongsToMany('App\Complement', 'complements_has_resources', 'resource_id', 'complement_id')
            ->withTimestamps();
    }

    public function dependency(){
        return $this->belongsTo('App\Dependency', 'dependency_id');
    }

    public function physicalState(){
        return $this->belongsTo('App\PhysicalState', 'physical_state_id');
    }

    public function type(){
        return $this->belongsTo('App\ResourceType', 'resource_type_id');
    }

    public function category(){
        return $this->belongsTo('App\ResourceCategory', 'resource_category_id');
    }

    public function status(){
        return $this->belongsTo('App\ResourceStatus', 'resource_status_id');
    }

    public function spaces(){
        return $this->belongsToMany('App\Space', 'spaces_has_resources', 'resource_id', 'space_id')
            ->withTimestamps();
    }

    public function authorizations(){
        return $this->belongsToMany('App\Authorization', 'authorizations_has_resources', 'resource_id', 'authorization_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\User', 'resources_has_users', 'resource_id', 'user_id')
            ->withTimestamps();
    }
}
