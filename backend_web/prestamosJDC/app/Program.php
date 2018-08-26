<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
