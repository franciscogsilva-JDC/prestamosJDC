<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Space extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'spaces';
    protected $fillable = [
        'name',
        'space_type_id',
        'space_status_id',
        'property_type_id'
    ];

    public function building(){
        return $this->belongsTo('App\Building', 'building_id');
    }

    public function headquarter(){
        return $this->belongsTo('App\Headquarter', 'headquarter_id');
    }

    public function propertyType(){
        return $this->belongsTo('App\PropertyType.php', 'property_id');
    }

    public function resources(){
        return $this->belongsToMany('App\Resource', 'spaces_has_resources', 'space_id', 'resource_id')
            ->withTimestamps();
    }

    public function type(){
        return $this->belongsTo('App\SpaceType', 'space_type_id');
    }

    public function status{
        return $this->belongsTo('App\SpaceStatus', 'space_status_id');
    }

    public function authorizations(){
        return $this->belongsToMany('App\Authorization', 'authorizations_has_spaces', 'space_id', 'authorization_id')
            ->withTimestamps();
    }
}
