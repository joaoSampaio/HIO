<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MailRemind extends Model
{
    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mail_reminds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'userIdOrEmail', 'challenge_id', 'reminded', 'uuid'
    ];
}
