<?php

namespace App\Model;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class ChallengeLevelUpGroup
{


    public $group = [];
    public $difficulties = [];


    public function __construct($listLvlUp)
    {
        foreach ($listLvlUp as &$item) {

            //echo "item->".$item->group_challenge;

            if (isset($this->group[$item->group_challenge])) {
//                $this->group[$item->group_challenge] = $data;
                array_push( $this->group[$item->group_challenge] , $item);
                array_push( $this->difficulties[$item->group_challenge] , $item->difficulty);
            } else {
                $this->group[$item->group_challenge] = array($item);
                $this->difficulties[$item->group_challenge] = array($item->difficulty);

            }
        }
    }

}
