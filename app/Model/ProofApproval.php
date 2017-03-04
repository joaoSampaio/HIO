<?php

namespace App\Model;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use App\ProofApproval;

class ProofApproval extends Model
{

    public static $timestamp = true;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proof_approval';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'proof_id','user_id', 'judgment'
    ];


    public static function getProofApproval($userId, $proofId){



        return DB::table('proof_approval')->where('user_id', $userId)->where('proof_id', $proofId)->first();
    }


}
