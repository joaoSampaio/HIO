<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Challenge;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    const PENDING = 0;
    const ACCEPTED = 1;
    const DENIED = 2;
    const BLOCKED = 3;

//    use Friendable;

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'about', 'sports', 'birthday', 'public', 'facebook_id','gender',
        'facebook_token', 'friends','location','interests', 'achievements', 'activated','password','role', 'address', 'photo', 'id_last_notification',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the challenges of the user.
     */
    public function challenges()
    {
        return $this->belongsToMany('App\Model\Challenge');
    }
}
