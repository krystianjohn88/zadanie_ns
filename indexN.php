<?php

function poszukiwacz(string $swiat,  $index): int{
    if($index== null){
        $index=-1;
    }
    /* tutaj ciało funkcji*/
    $poziom=0;
    $skarb=[];
    $iSkarb=[];
    for($i=$index; $i>=0; $i--){
        if($swiat[$i]==='('){
            $poziom++;
        }elseif($swiat[$i]===')'){
            $poziom--;
        }else{
            array_unshift($skarb, [$poziom, $i]);
        } 
    }
    for($i=$index+1; $i<strlen($swiat); $i++){
        if($swiat[$i]==='('){
            $poziom++;
        }elseif($swiat[$i]===')'){
            $poziom--;
        }else{
            array_push($skarb, [$poziom, $i]);
        } 
    }
    $i=0;
    while($i <count($skarb)){
        array_push($iSkarb, $skarb[$i][0]);
        $i++;
    }
    $iSkarb = array_count_values($iSkarb);
    for($i=0; $i<count($skarb); $i++){
        if($skarb[$i][0]==array_keys($iSkarb, max($iSkarb))[0]){
            $index = $skarb[$i][1];
            $i=count($skarb);
        }
    }
    return $index;
}
$arrTest = [];
$arrTest[] = ["cave"=>"(((*))(((((*)))(*))))",'index'=> 3];
$arrTest[] = ["cave"=>"(((**))(((((*)))(***))))(((*",'index'=> 4];
$arrTest[] = ["cave"=>"(((*))(((((***)))(*******))))(((*",'index'=> 22];
$arrTest[] = ["cave"=>"(((****))(((((***)))(*))))(((*",'index'=> 10];
$arrTest[] = ["cave"=>"",'index'=> null];

foreach($arrTest as $t){
    echo poszukiwacz($t['cave'], $t['index']).' => index poczatkowy: '.$t['index'].PHP_EOL; //zmodifikowałem tak aby funckja przyjeła też index
}
