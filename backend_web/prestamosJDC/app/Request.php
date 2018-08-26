<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'requests';
    protected $fillable = [
        'user_id',
        'responsible_id',
        'request_type_id'
    ];

    public function authorization(){
        return $this->hasMany('App\Authorization');
    }

    public function participantTypes(){
        return $this->belongsToMany('App\ParticipantType', 'participant_types_has_requests', 'request_id', 'participant_type_id')
            ->withTimestamps();
    }

    public function type(){
        return $this->belongsTo('App\RequestType', 'request_type_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function responsible(){
        return $this->belongsTo('App\User', 'responsible_id');
    }
}
