<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FileHio extends Model
{

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //type -> integer (0-> image, 1->video)
    protected $fillable = [
         'views', 'likes','filename', 'created_at', 'id', 'user_id', 'challenge_id', 'type'
    ];



}
