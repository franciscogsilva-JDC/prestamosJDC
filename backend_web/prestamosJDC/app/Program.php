<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

class Program extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'programs';
    protected $fillable = [
        'name',
        'program_type_id',
        'dependency_id'
    ];

    public function dependency(){
        return $this->belongsTo('App\Dependency', 'dependency_id');
    }

    public function modalities(){
        return $this->belongsToMany('App\Modality', 'programs_has_modalities', 'program_id', 'modality_id')
            ->withTimestamps();
    }

    public function workingDays(){
        return $this->belongsToMany('App\WorkingDay', 'programs_has_working_days', 'program_id', 'working_day_id')
            ->withTimestamps();
    }

    public function type(){
        return $this->belongsTo('App\ProgramType', 'program_type_id');
    }

    public function scopeSearch($query, $name, $program_type_id, $dependency_id, $working_day_id, $modality_id){
        if(!empty($name)){
            $query = $query->where('name', 'LIKE', "%$name%");
        }if(!empty($program_type_id)){
            $query = $query->where('program_type_id', $program_type_id);
        }if(!empty($dependency_id)){
            $query = $query->where('dependency_id', $dependency_id);
        }if(!empty($working_day_id)){
            $query = $query->whereHas('workingDays', function($workingDays) use($working_day_id){
                $workingDays->where('working_day_id', $working_day_id);
            });
        }if(!empty($modality_id)){
            $query = $query->whereHas('modalities', function($modalities) use($modality_id){
                $modalities->where('modality_id', $modality_id);
            });
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
