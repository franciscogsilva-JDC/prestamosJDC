<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

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
        return $this->belongsTo('App\PropertyType', 'property_type_id');
    }

    public function resources(){
        return $this->belongsToMany('App\Resource', 'spaces_has_resources', 'space_id', 'resource_id')
            ->withTimestamps();
    }

    public function type(){
        return $this->belongsTo('App\SpaceType', 'space_type_id');
    }

    public function status(){
        return $this->belongsTo('App\SpaceStatus', 'space_status_id');
    }

    public function authorizations(){
        return $this->belongsToMany('App\Authorization', 'authorizations_has_spaces', 'space_id', 'authorization_id')
            ->withTimestamps();
    }

    public function scopeSearch($query, $name, $max_persons, $space_type_id, $space_status_id, $property_type_id, $building_id, $headquarter_id){
        if(!empty($name)){
            $query = $query->where('name', 'LIKE', "%$name%");
        }if(!empty($max_persons)){
            $query = $query->where('max_persons', '<=', $max_persons);
        }if(!empty($space_status_id)){
            $query = $query->where('space_status_id', $space_status_id);
        }if(!empty($space_type_id)){
            $query = $query->where('space_type_id', $space_type_id);
        }if(!empty($property_type_id)){
            $query = $query->where('property_type_id', $property_type_id);
        }if(!empty($building_id)){
            $query = $query->where('building_id', $building_id);
        }if(!empty($headquarter_id)){
            $query = $query->where('headquarter_id', $headquarter_id);
        }

        return $query;
    }

    public function getCreatedAtAttribute($date){
        if($date == null){
            return null;
        }
        return new Date($date);       
    }

    public function getUpdatedAtAttribute($date){
        if($date == null){
            return null;
        }
        return new Date($date);
    }

    public function getDeletedAtAttribute($date){
        if($date == null){
            return null;
        }
        return new Date($date);
    }
}
