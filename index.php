<?php

function poszukiwacz(string $swiat): int{
    $index = -1;
    /* tutaj ciało funkcji*/
    $poziom=0;
    $skarb=[];
    $iSkarb=[];
    for($i=0; $i<strlen($swiat); $i++){
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
    echo array_search(6, $skarb).PHP_EOL;
    for($i=0; $i<count($skarb); $i++){
        if($skarb[$i][0]==array_keys($iSkarb, max($iSkarb))[0]){
            $index = $skarb[$i][1];
            $i=count($skarb);
        }
    }
    return $index;
}
//$arrT=["cave"=>"(((*))(((((*)))(*))))"];
$arrTest = [];
$arrTest[] = ["cave"=>"(((*))(((((*)))(*))))(((*",'index'=> 1];
$arrTest[] = ["cave"=>"(((*))(((((***)))(*******))))(((*",'index'=> 2];
$arrTest[] = ["cave"=>"(((****))(((((***)))(*))))(((*",'index'=> 3];
$arrTest[] = ["cave"=>"",'index'=> null];

foreach($arrTest as $t){
    echo poszukiwacz($t['cave']).'  => '.$t['index'].PHP_EOL;
}
?>
