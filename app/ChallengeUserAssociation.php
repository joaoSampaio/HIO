<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChallengeUserAssociation extends Model
{

    public static $timestamp = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'challenge_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'file_id','user_id', 'challenge_id'
    ];

    public function getUpdatedAtColumn() {
        return null;
    }

    public function setUpdatedAt($value){

    }

}
