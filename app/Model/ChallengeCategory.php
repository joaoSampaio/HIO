<?php

namespace App\Model;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class ChallengeCategory extends Model
{

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'challenge_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'name','photo', 'visible', 'active'
    ];




}
