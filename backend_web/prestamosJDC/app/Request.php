<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;

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

    public function authorizations(){
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

    public function scopeSearch($query, $search, $request_type_id, $authorization_status_id, $user_type_id, $start_date, $end_date, $received_date){
        if(!empty($search)){
            $query = $query->whereHas('user', function($user) use($search){
                $user->where('name', 'LIKE', "%$search%")
                    ->orWhere('dni', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%");
            });
        }if(!empty($request_type_id)){
            $query = $query->where('request_type_id', $request_type_id);
        }if(!empty($authorization_status_id)){
            $query = $query->whereHas('authorization', function($authorization) use($authorization_status_id){
                $authorization->where('authorization_status_id', $authorization_status_id);
            });
        }if(!empty($user_type_id)){
            $query = $query->whereHas('user', function($user) use($user_type_id){
                $user->where('user_type_id', $user_type_id);
            });
        }if(!empty($start_date)){
            $query = $query->whereDate('start_date', '>=', Carbon::parse(str_replace("\0","",$start_date)));
        }if(!empty($end_date)){
            $query = $query->whereDate('end_date', '<=', Carbon::parse(str_replace("\0","",$end_date)));
        }if(!empty($received_date)){
            $query = $query->whereDate('received_date', '=', Carbon::parse(str_replace("\0","",$received_date)->toDateString()));
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

    public function getStartDateAttribute($date){
        if($date == null){
            return null;
        }
        return new Date($date);
    }

    public function getEndDateAttribute($date){
        if($date == null){
            return null;
        }
        return new Date($date);
    }

    public function getReceivedDateAttribute($date){
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

    public function calculeSpaceValue(){
        return 0;
    }
}
