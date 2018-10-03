<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'buildings';
    protected $fillable = [
        'name',
        'headquarter_id'
    ];

    public function headquarter(){
        return $this->belongsTo('App\Headquarter', 'headquarter_id');
    }

    public function spaces(){
        return $this->hasMany('App\Space');
    }

    public function scopeSearch($query, $search, $headquarter_id){
        if(!empty($search)){
            $query = $query->where('name', 'LIKE', "%$search%")
                ->orWhere('nomenclature', 'LIKE', "%$search%");
        }if(!empty($headquarter_id)){
            $query = $query->where('headquarter_id', $headquarter_id);
        }

        return $query;
    }
}
