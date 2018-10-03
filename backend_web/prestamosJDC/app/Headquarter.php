<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Headquarter extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'headquarters';
    protected $fillable = [
        'name',
        'address',
        'town_id'
    ];

    public function buildings(){
        return $this->hasMany('App\Building');
    }

    public function town(){
        return $this->belongsTo('App\Town', 'town_id');
    }

    public function dependencies(){
        return $this->hasMany('App\Dependency');
    }

    public function spaces(){
        return $this->hasMany('App\Space');
    }

    public function scopeSearch($query, $search, $town_id){
        if(!empty($search)){
            $query = $query->where('name', 'LIKE', "%$search%")
                ->orWhere('address', 'LIKE', "%$search%");
        }if(!empty($town_id)){
            $query = $query->where('town_id', $town_id);
        }

        return $query;
    }
}
