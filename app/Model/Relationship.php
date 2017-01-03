<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Relationship extends Model
{

    const FRIEND = 0;
    const SENT_FRIEND = 1;
    const RECEIVED_FRIEND = 2;
    const BLOCKED = 3;

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
