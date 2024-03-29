<?php

namespace App\Model;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'challenges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'title','creator_id', 'challenge_lvl_up_id', 'public', 'description',
        'category_id', 'reward', 'penalty', 'deadLine', 'secret', 'uuid','closed', 'judged', 'reminded'
    ];

    /**
     * The users that belong to the challenge.
     */
    public function users()
    {
        return $this->belongsToMany('App\Model\User');
    }

//    public function votes()
//    {
//        return $this->hasMany('App\Vote');
//    }

    public function scopeClosed($query)
    {
        return $query->where('closed', '=', 1)->orWhereDate('deadLine', '<', Carbon::now());;
    }

    public function isClosed(){

        if($this->closed)
            return true;

        $now = new DateTime();
        $deadLine = new DateTime($this->deadLine);
        return ($now > $deadLine);

    }

    public function category()
    {
        return $this->hasOne('App\Model\ChallengeCategory', 'id', 'category_id');
    }


}
