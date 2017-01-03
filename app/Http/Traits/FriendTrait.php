<?php
/**
 * Created by PhpStorm.
 * User: Sampaio
 * Date: 12/12/2016
 * Time: 16:06
 */

namespace app\Http\Traits;

use Auth;
use App\Model\User;
use App\Model\Relationship;
use Illuminate\Support\Facades\DB;
trait  FriendTrait {



    /**
     * Get all the friends list for the currently loggedin user
     *
     * @return array Relationship Objects
     */
    public function getAllFriends($id, $search = NULL, $perPage = 0)
    {

        if ($search == NULL) {
            $queryBuilder = DB::table('relationship')
                ->where(function ($query) use ($id) {
                    $query->where('user_one_id', $id)
                        ->orWhere('user_two_id', $id);
                })
                ->where('status', User::ACCEPTED)
                ->join('users', function ($join) use ($id) {
                    $join->on('users.id', '=', 'relationship.user_one_id')->where('users.id', '!=', $id)
                        ->orOn('users.id', '=', 'relationship.user_two_id')->where('users.id', '!=', $id);
                })
                ->select('users.name', 'users.id', 'users.photo', 'users.email');

                 $users = $this->getOrPaginate($queryBuilder, $perPage, Relationship::FRIEND);

        }else{
            $search = strtolower($search);
//            echo "str_contains->".str_contains(strtolower (Auth::user()->name), $search);
            if(($search == "me" || str_contains(strtolower (Auth::user()->name), $search))&& Auth::check()  ){
                $queryUsers = DB::table('relationship')
                    ->where(function ($query) use ($id) {
                        $query->where('user_one_id', $id)
                            ->orWhere('user_two_id', $id);
                    })
                    ->where('status', User::ACCEPTED)
                    ->join('users', function ($join) use ($id,$search) {
                        $join->on('users.id', '=', 'relationship.user_one_id')->where('users.id', '!=', $id)->orOn('users.id', '=', 'relationship.user_two_id')->where('users.id', '!=', $id);
                    })
                    ->where('users.name', 'like', '%'.$search.'%')
                    ->select('users.name', 'users.id', 'users.photo');
//                    ->get();

                $queryUser = DB::table('users')
                    ->where('id', '=', Auth::user()->id)
                    ->select('name', 'id', 'photo')
                    ->union($queryUsers)
                    ->get();
                $users = $queryUser;

            }else{
                $users = DB::table('relationship')
                    ->where(function ($query) use ($id) {
                        $query->where('user_one_id', $id)
                            ->orWhere('user_two_id', $id);
                    })
                    ->where('status', User::ACCEPTED)
                    ->join('users', function ($join) use ($id,$search) {
                        $join->on('users.id', '=', 'relationship.user_one_id')->where('users.id', '!=', $id)->orOn('users.id', '=', 'relationship.user_two_id')->where('users.id', '!=', $id);
                    })
                    ->where('users.name', 'like', '%'.$search.'%')
                    ->select('users.name', 'users.id', 'users.photo')
                    ->get();
            }

        }
        //->select('users.name, users.id, users.photo')
//->where('users.name', 'like', '%'.$search.'%')

        return $users;
    }


    /**
     * Get the list of friend requests sent by the logged in user
     *
     * @return array Relationship Objects
     */
    public function getSentFriendRequests($perPage = 0) {
        $id = Auth::user()->id;

        $queryBuilder = DB::table('relationship')
            ->where(function ($query) use ($id) {
                $query->where('user_one_id', $id)
                    ->orWhere('user_two_id', $id);
            })
            ->where('status', User::PENDING)
            ->where('action_user_id', $id)
            ->join('users', function ($join) use ($id) {
                $join->on('users.id','=', 'relationship.user_one_id')->where('users.id', '!=', $id)->orOn('users.id','=', 'relationship.user_two_id')->where('users.id', '!=', $id);
            })
            ->select('users.*');

        return $this->getOrPaginate($queryBuilder, $perPage, Relationship::SENT_FRIEND);


    }

    /**
     * Get the list of friend requests for the logged in user
     *
     * @return array Relationship Objects
     */
    public function getFriendRequests($perPage = 0) {
        $id = Auth::user()->id;


        $queryBuilder = DB::table('relationship')
            ->where(function ($query) use ($id) {
                $query->where('user_one_id', $id)
                    ->orWhere('user_two_id', $id);
            })
            ->where('status', User::PENDING)
            ->where('action_user_id','!=', $id)
            ->join('users', function ($join) use ($id) {
                $join->on('users.id','=', 'relationship.user_one_id')->where('users.id', '!=', $id)->orOn('users.id','=', 'relationship.user_two_id')->where('users.id', '!=', $id);
            })
            ->select('users.*');


        return $this->getOrPaginate($queryBuilder, $perPage, Relationship::RECEIVED_FRIEND);
    }

    /**
     * Get the list of friend requests for the logged in user
     *
     * @return array Relationship Objects
     */
    public function getBlockedFriends($perPage = 0) {
        $id = Auth::user()->id;


        $queryBuilder = DB::table('relationship')
            ->where(function ($query) use ($id) {
                $query->where('user_one_id', $id)
                    ->orWhere('user_two_id', $id);
            })
            ->where('status', User::BLOCKED)
            ->where('action_user_id','=', $id)
            ->join('users', function ($join) use ($id) {
                $join->on('users.id','=', 'relationship.user_one_id')->where('users.id', '!=', $id)->orOn('users.id','=', 'relationship.user_two_id')->where('users.id', '!=', $id);
            })
            ->select('users.*');


        return $this->getOrPaginate($queryBuilder, $perPage, Relationship::BLOCKED);
    }



    /**
     * Insert a new friends request
     *
     * @param User $user - User to which the friend request must be added with.
     * @return Boolean
     */
    public function befriendWith(User $user) {
        return $this->befriendWithId($user->id);
    }

    public function befriendWithId($idFriend) {
        $user_one = $id = Auth::user()->id;
        $action_user_id = $user_one;
        $user_two = $idFriend;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }

        $relationship = new Relationship(['user_one_id' => $user_one, 'user_two_id' => $user_two, 'status' => User::PENDING,
            'action_user_id' => $action_user_id]);
        return $relationship->save();
    }




    /**
     * Accept a friend request
     *
     * @param User $user - User to whome the friend request must be accepted with.
     * @return Boolean
     */
    public function acceptFriendRequest($userId) {
        $user_one = Auth::user()->id;
        $action_user_id = $user_one;
        $user_two = $userId;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }
        return Relationship::where('user_one_id', '=', $user_one)
            ->where('user_two_id', '=', $user_two)
            ->update(['status' => User::ACCEPTED, 'action_user_id' => $action_user_id]);
    }


    /**
     * Decline a friend request for the user
     *
     * @params User $user - The user whose request to be declined
     * @return Boolean
     */
    public function declineFriendRequest($userId) {
        $user_one = Auth::user()->id;
        $action_user_id = $user_one;
        $user_two = $userId;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }

        return Relationship::where('user_one_id', '=', $user_one)
            ->where('user_two_id', '=', $user_two)
            ->update(['status' => User::DENIED, 'action_user_id' => $action_user_id]);

    }


    /**
     * Cancel a friend request
     *
     * @param User $user - The friend details
     * @return Boolean
     */
    public function cancelFriendRequest($userId) {
        $user_one =  Auth::user()->id;
        $user_two =  $userId;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }

        return Relationship::where('user_one_id', '=', $user_one)
            ->where('user_two_id', '=', $user_two)
            ->where('status', '=', User::PENDING)
            ->delete();

    }

    /**
     * Remove a friend from the friends list
     *
     * @param User $user - The friend details
     * @return Boolean
     */
    public function unfriend($userId) {
        $user_one =  Auth::user()->id;
        $user_two =  $userId;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }

        return Relationship::where('user_one_id', '=', $user_one)
            ->where('user_two_id', '=', $user_two)
            ->where('status', '=', User::ACCEPTED)
            ->delete();

    }


    /**
     * Block a particular user
     *
     * @param User $user - The user to be blocked
     * @return Boolean
     */
    public function block($userId) {
        $user_one =  Auth::user()->id;
        $action_user_id = $user_one;
        $user_two = $userId;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }

        return Relationship::where('user_one_id', '=', $user_one)
            ->where('user_two_id', '=', $user_two)
            ->update(['status' => User::BLOCKED, 'action_user_id' => $action_user_id]);

    }

    /**
     * Unblock a friend who is blocked already.
     *
     * @param User $user
     * @return boolean
     */
    public function unblockFriend($userId) {
        $user_one = Auth::user()->id;
        $user_two = $userId;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }


        return Relationship::where('user_one_id', '=', $user_one)
            ->where('user_two_id', '=', $user_two)
            ->where('status', '=', User::BLOCKED)
            ->delete();

    }


    /**
     * Get the relatiohship for the friend and user
     *
     * @param User $user
     * @return boolean|int - either false or the relationship status
     */
    public function getRelationship($userId) {
        $user_one = Auth::user()->id;
        $user_two = $userId;

        if ($user_one > $user_two) {
            $temp = $user_one;
            $user_one = $user_two;
            $user_two = $temp;
        }

        return Relationship::where('user_one_id', '=', $user_one)
            ->where('user_two_id', '=', $user_two)
            ->first();

    }

    public function isFriend($userId) {
        if($relationship = getRelationship($userId)){
            return $relationship->status == User::ACCEPTED;
        }
    }

    public function canBeFriend($userId) {
        if($relationship = $this->getRelationship($userId)){
            return false;
//            return $relationship->status != User::ACCEPTED && $relationship->status != User::BLOCKED && $relationship->status != User::PENDING;
        }
        return true;
    }



    protected function getOrPaginate($builder, $perPage, $type)
    {
        if ($perPage == 0) {
            return $builder->get();
        }

        if($type == Relationship::FRIEND){
            return $builder->paginate($perPage, $columns = ['*'], $pageName = 'friendpage', $page = null);
        } else if($type == Relationship::SENT_FRIEND){
            return $builder->paginate($perPage, $columns = ['*'], $pageName = 'sentfriendpage', $page = null);
        } else if($type == Relationship::RECEIVED_FRIEND){
            return $builder->paginate($perPage, $columns = ['*'], $pageName = 'receivedfriendpage', $page = null);
        }else if($type == Relationship::BLOCKED){
            return $builder->paginate($perPage, $columns = ['*'], $pageName = 'blockedfriendpage', $page = null);
        }

        //->paginate($perPage = $this->getPageTotal(), $columns = ['*'], $pageName = 'ended', $page = null);
        return $builder->paginate($perPage);
    }


} 