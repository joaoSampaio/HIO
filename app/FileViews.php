<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileViews extends Model
{

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files_views';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id', 'user_id', 'file_id'
    ];



}
