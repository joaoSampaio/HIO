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