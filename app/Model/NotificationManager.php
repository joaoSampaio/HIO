<?php
/**
 * Created by PhpStorm.
 * User: Sampaio
 * Date: 02/01/2017
 * Time: 23:25
 */

namespace app\Model;

use Illuminate\Support\Facades\DB;

class NotificationManager {

    public function add(Notification $notification){

        $notification->save();
    }

    public function markRead(array $notifications){
        foreach($notifications as $notification){
            $notification->unread = false;
            $notification->save();
        }
    }

    public function getNumberUnread(User $user){
        return DB::table('notifications')
            ->where('recipient_id',  '=', $user->id)
            ->where('unread', '=' , 1)
            ->count();
        //->where('unread', '=' , 1)
    }

    public function getNumberNewNotifications(User $user){
        return DB::table('notifications')
            ->where('recipient_id',  '=', $user->id)
            ->where('unread', '=' , 1)
            ->where('id', '>' , $user->id_last_notification)
            ->count();
        //->where('unread', '=' , 1)
    }

    public function get(User $user, $limit = 20, $offset = 0){
        return DB::table('notifications')
            ->where('recipient_id',  '=', $user->id)
            ->join('users', 'notifications.sender_id', '=', 'users.id')
            ->orderBy('id', 'desc')
            ->select('users.name', 'notifications.id', 'notifications.*')
            ->take($limit)->get();
        //->where('unread', '=' , 1)
    }

} 