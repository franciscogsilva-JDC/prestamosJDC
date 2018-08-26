<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantType extends Model
{
    protected $table = 'participant_types';
    protected $fillable = [
        'name'
    ];

    public function programs(){
        return $this->belongsToMany('App\Program', 'programs_has_modalities', 'modality_id', 'program_id')
            ->withTimestamps();
    }
}
