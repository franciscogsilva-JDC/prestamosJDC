<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model
{
    protected $table = 'working_days';
    protected $fillable = [
        'name'
    ];

    public function programs(){
        return $this->belongsToMany('App\Program', 'programs_has_working_days', 'working_day_id', 'program_id')
            ->withTimestamps();
    }
}
