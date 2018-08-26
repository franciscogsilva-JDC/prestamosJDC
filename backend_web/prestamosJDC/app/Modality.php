<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    protected $table = 'modalities';
    protected $fillable = [
        'name'
    ];

    public function requests(){
        return $this->belongsToMany('App\Request', 'participant_types_has_requests', 'participant_type_id', 'request_id')
            ->withTimestamps();
    }
}
