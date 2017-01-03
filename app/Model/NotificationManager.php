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
        $latest = DB::table('notifications')
            ->where('recipient_id',  '=', $user->id)->where('challenges.public', '=' , 1)
            ->join('users', 'files.user_id', '=', 'users.id')
            ->select('users.name','users.id', 'files.id', 'users.facebook_id', 'files.*', 'challenges.title', 'challenges.uuid')
            ->orderBy('views', 'desc')
            ->take(5)->get();
    }

} 