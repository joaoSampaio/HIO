<?php
/**
 * Created by PhpStorm.
 * User: joaosampaio
 * Date: 16-03-2016
 * Time: 18:44
 */

function getFirstName($string){
    $words = explode(" ", $string);

    return $words[0];
}

function getFirstLastName($string){
    $words = explode(" ", $string);
    if(count($words) > 1)
        return $words[0] . " " . $words[count($words) - 1];
    return $words[0];
}

function truncateString($string, $len){
    return str_limit($string, $len);
}

function getDayMonth($string){
    $time = strtotime($string);

    $newformat = date('d M',$time);
    return $newformat;
}


function multiexplode ($delimiters,$string) {
    $ary = explode($delimiters[0],$string);
    array_shift($delimiters);

    if($delimiters != NULL) {
        foreach($ary as $key => $val) {
            $ary[$key] = multiexplode($delimiters, $val);
        }
    }
    return  array_filter(array_flatten($ary));
}

function ola(){
    echo 'joao e grande';
}

function achievementToHtml($achievements){
    if($achievements == NULL){
        return;
    }else{
        $achievements = json_decode($achievements, true);
        if (array_key_exists('1create', $achievements)) {
            echo view('partials.achievement')->with('icon', '1_created.png')->with('title', 'First created');
        }
        if(array_key_exists('totalCompleted', $achievements)){
            echo view('partials.achievement')->with('icon', '1_completed.png')->with('title', 'First Challenge completed');
            if($achievements['totalCompleted'] >=5 )
                echo view('partials.achievement')->with('icon', '5_completed.png')->with('title', 'Five Challenges completed');
        }
    }



}


  function nameToUrl($name){
      $url = "";
      switch($name){
          case 'Awesome Stuff':
              $url = 'Amazing.jpg';
              break;
          case 'Running':
              $url = 'Running.jpg';
              break;
          case 'Trail':
              $url = 'Trail.jpg';
              break;
          case 'Gym':
              $url = 'Gym.jpg';
              break;
          case 'Fitness':
              $url = 'Fitness.jpg';
              break;
          case 'Football':
              $url = 'Soccer.jpg';
              break;
          case 'Golf':
              $url = 'Golf.jpg';
              break;
          case 'Tennis':
              $url = 'Tennis.jpg';
              break;
          case 'Rugby':
              $url = 'Rugby.jpg';
              break;
          case 'Surf':
              $url = 'Surf.jpg';
              break;
          case 'Bodyboard':
              $url = 'Bodyboard.jpg';
              break;
          case 'Swimming':
              $url = 'Swim.jpg';
              break;
          case 'Martial Arts':
              $url = 'Martial-Arts.jpg';
              break;
          case 'Cycling':
              $url = 'Cycling.jpg';
              break;
          case 'Gymnastics':
              $url = 'Gymnastic.jpg';
              break;
          case 'Basketball':
              $url = 'Basketball.jpg';
              break;
          case 'Volleyball':
              $url = 'Volley.jpg';
              break;
          case 'Snow Sports':
              $url = 'Ski.jpg';
              break;
          case 'Hockey':
              $url = 'Hockey.jpg';
              break;




          case 'Boxe':
              $url = 'Categories_Thumb_Boxe.jpg';
              break;
          case 'Karate':
              $url = 'Categories_Thumb_Karate.jpg';
              break;
          case 'Judo':
              $url = 'Categories_Thumb_Judo.jpg';
              break;
          case 'Jiu-Jitsu':
              $url = 'Categories_Thumb_Jiu-Jitsu.jpg';
              break;
          case 'Muay Thai':
              $url = 'Martial-Arts.jpg';
              break;
          case 'Taekwondo':
              $url = 'Categories_Thumb_Taekwondo.jpg';
              break;
          case 'Kickboxing':
              $url = 'Categories_Thumb_Kickboxing.jpg';
              break;
          case 'MMA':
              $url = 'Categories_Thumb_MMA.jpg';
              break;

      }
      return $url;
  }
