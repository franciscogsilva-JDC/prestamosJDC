<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Dependency extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'dependencies';
    protected $fillable = [
        'name',
        'headquarter_id',
        'email'
    ];

    public function headquarter(){
        return $this->belongsTo('App\Headquarter', 'headquarter_id');
    }

    public function programs(){
        return $this->hasMany('App\Program');
    }

    public function resources(){
        return $this->hasMany('App\Resource');
    }

    public function users(){
        return $this->hasMany('App\User');
    }

    public function attendants(){
        return $this->belongsToMany('App\User', 'dependencies_has_users', 'dependency_id', 'attendant_id')
            ->withTimestamps();
    }

    public function scopeSearch($query, $search, $headquarter_id){
        if(!empty($search)){
            $query = $query->where('name', 'LIKE', "%$search%")
                ->orWhereHas('attendants', function($attendants) use($search){
                    $attendants->where('name', 'LIKE', "%$search%");
                });
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
