<?php namespace App\Http\Controllers;

use App;
use App\Jobs\ProcessVideo;
use App\Model\Challenge;
use App\Model\FileHio;
use App\Model\LikedChallengeNotification;
use App\Model\Notification;
use Carbon\Carbon;
use App\Model\NotificationManager;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Input;
use Intervention\Image\Facades\Image;

use Auth;

use App\Model\ChallengeUserAssociation;
use App\Model\User;

use App\Http\Requests\FileFormRequest;

use Illuminate\Support\Facades;


class NotificationsController extends Controller {



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('publico');
    }






    public function markRead($id){

        $notification = App\Model\Notification::find($id);
        $notificationManager = new NotificationManager();
        $notificationManager->markRead(array($notification));

    }

    //allow the user to remove the unread number by opening the list
    public function updateLastSeenNotifications($id){

        Auth::user()->id_last_notification =$id;
        Auth::user()->save();

    }


    public function getNotifications(){
        if (Auth::check() ) {
//            $id = Auth::user()->id;

            $notificationManager = new NotificationManager();

            $numberUnread = $notificationManager->getNumberNewNotifications(Auth::user());
            $results = $notificationManager->get(Auth::user());

            $max_id = 0;
            if(!empty($results)){
                $max_id = $results[0]->id;
            }

            return json_encode(view('partials.notifications')
                ->with('notifications',$results)
                ->with('numberUnread',$numberUnread)
                ->with('max_id',$max_id)
                ->render());

        }
        return "nao";

    }



}
