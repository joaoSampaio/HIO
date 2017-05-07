<?php

namespace App\Model;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class CategoryLevel extends Model
{

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_level';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'category_id','user_id',  'level', 'deadLineLvl'
    ];


}
