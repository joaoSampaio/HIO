<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

abstract class Notification extends Model
{

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'notifications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'recipient_id', 'sender_id', 'unread', 'type', 'parameters', 'reference_id',
    ];


    /**
     * Message generators that have to be defined in subclasses
     */
    abstract protected function messageForNotification(Notification $notification);
    abstract protected function messageForNotifications(array $notifications);

    /**
     * Generate message of the current notification.
     */
    public function message()
    {
        return $this->messageForNotification($this);
    }

}
