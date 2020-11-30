<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable =['title',"mobile",'email','first_member','pdf','app','video'];

    public static function boot() {

        parent::boot();

        static::deleting(function($team) { // Delete Relations  Before deleting Item
            $team->TeamMembers()->delete();//Delete team_members

        });
    }

    public function TeamMembers(){
        return $this->hasMany('App\TeamMember');
    }
}
