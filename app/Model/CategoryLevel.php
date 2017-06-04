<?php

namespace App\Model;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CategoryLevel extends Model
{

    public static $timestamp = true;
    protected $primaryKey = ['user_id', 'category_id'];
    public $incrementing = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_level';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'category_id','user_id',  'level', 'deadLineLvl', 'inProgress', 'completedGroups', 'failedGroups'
    ];


    public function addCompleted($group){

        $groupsInProgress = $this->getInProgressGroups();
        $completed = $this->getCompletedGroups();

        //se o desafio estiver nos desafios em progresso
        if (array_key_exists($group, $groupsInProgress)) {
            $value = $groupsInProgress[$group];
            $completed[$group] = $value;
            unset($groupsInProgress[$group]);
            $this->inProgress = json_encode($groupsInProgress);
            $this->completedGroups = json_encode($completed);
        }
    }

    public function addFailed($group){
        echo "<br>addFailed called:".$group;
        $groupsInProgress = $this->getInProgressGroups();
        $failed = $this->getFailedGroups();

        echo "<br>array_key_exists:".array_key_exists($group, $groupsInProgress);
        //se o desafio estiver nos desafios em progresso
        if (array_key_exists($group, $groupsInProgress)) {
            $value = $groupsInProgress[$group];
            $failed[$group] = $value;
            unset($groupsInProgress[$group]);
            $this->inProgress = json_encode($groupsInProgress);
            $this->failedGroups = json_encode($failed);
        }
    }


    public function getInProgressAndCompleted(){
        return array_merge($this->getInProgressGroups(), $this->getCompletedGroups());
    }

    public function getFailedGroups(){
        $failed = json_decode($this->failedGroups, true);
//        $failed = multiexplode(array(","),$this->failedGroups);
//        if(count($failed) == 0){
//            $failed = array($this->failedGroups);
//        }
        if($failed == null)
            $failed = array();
        return $failed;
    }


    public function getInProgressGroups(){
        $inProgress = json_decode($this->inProgress, true);
//        $inProgress = multiexplode(array(","),$this->inProgress);
//        if(count($inProgress) == 0){
//            $inProgress = array($this->inProgress);
//        }
        if($inProgress == null)
            $inProgress = array();
        return $inProgress;
    }

    public function getCompletedGroups(){
        $completed = json_decode($this->completedGroups, true);
//        $completed = multiexplode(array(","),$this->completedGroups);
//        if(count($completed) == 0){
//            $completed = array($this->completedGroups);
//        }
        if($completed == null)
            $completed = array();
        return $completed;
    }

    public function getCountCompleted(){
        $completed = $this->getCompletedGroups();
        return count($completed);
    }


    public static function getXPForLevel($level){
        $levels =  [
            '0' => '100',
            '1' => '200',
            '2' => '300',
            '3' => '400',
            '4' => '500'
        ];
        //nao existe maior que nivel 5
        if($level >= 5){
            return 1000000;
        }

        return $levels[$level];
    }

    public static function getCurrentXPForLevel($level, $currentXP){
        $levels =  [
            '0' => '0',
            '1' => '100',
            '2' => '300',
            '3' => '600',
            '4' => '1000',
            '5' => '1500'
        ];
        //nao existe maior que nivel 5
        if($level > 5){
            return 1000000;
        }

        return $currentXP - $levels[$level];
    }

    public static function isLvlUpAvailable($level, $currentXP){

        return CategoryLevel::getCurrentXPForLevel($level, $currentXP) >= CategoryLevel::getXPForLevel($level);

    }



    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }

}
