<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{

    protected $fillable =['name'];

    public function team(){
        return $this->belongsTo('App\Team','team_id');
    }
}
