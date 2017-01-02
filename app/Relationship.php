<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Relationship extends Model
{

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'relationship';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    //type -> integer (0-> image, 1->video)
    protected $fillable = [
         'user_one_id', 'user_two_id','status', 'action_user_id',
    ];










}
