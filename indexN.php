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

//Treść zadania do samodzielnego wykonania w ramach I etapu:
//
//----------------
//
//Dany jest ciąg , który zawiera tylko znaki:
//
//'(', ')', '*'
//
//Przykład:
//
//"(((*))(((((*)))(*))))"
// 
//Niech długość ciągu wynosi N.
//
//Opisuje on 1-wymiarowy świat, w którym można poruszać się w lewo i w prawo.
// 
//'(' oznacza schody w głąb jaskini (poziom - 1)
//
//')' oznacza schody w górę (poziom + 1)
//
//'*' oznacza skarb
//
//Po swiecie wędruje poszukiwacz skarbów. Jego pozycję określa indeks w ciagu znaków reprezentujacym świat.
//
//Początkowy poziom wynosi 0, początkowy indeks: -1 lub N, wedle uznania rozwiązującego zadanie.
//Przesunięcie się na znak '(' lub ')' oznacza skorzystanie ze schodów. Przesunięcie się na ‘*’ nie zmienia poziomu.
//Ustawienie się na indeksie spoza [0,N) nie ma żadnych skutków.
// 
//Zaimplementuj funkcje, która pomoże poszukiwaczowi skarbów poruszajacemu się zgodnie z regułami podanymi wyżej 
//znaleźć najmniejszy indeks należący do zbioru [0, N) taki, że: 
//znajduje się w nim skarb oraz na poziomie odpowiadającym temu indeksowi jest najwięcej skarbów w całym zbiorze.
//
// 
//Argumentem jest opisany w zadaniu ciąg znaków, a wartością zwracana szukany indeks.
//
//----------------
//Przykład:
//		+===============================================================================================================================================================================+
//index:  |	0	|	1	|	2	|	3	|	4	|	5	|	6	|	7	|	8	|	9	|	10	|	11	|	12	|	13	|	14	|	15	|	16	|	17	|	18	|	19	|	20	|	21	|
//ciąg:	  |	(	|	(	|	(	|	*	|	)	|	)	|	(	|	(	|	(	|	(	|	(	|	*	|	)	|	)	|	)	|	* 	|	(	|	*	|	)	|	)	|	)	|	)	|
//poziom: | -1	|	-2	|	-3	|	-3	|	-2	|	-1	|	-2	|	-3	|	-4	|	-5	|	-6	|	-6	|	-5	|	-4	|	-3	|	-3	|	-4	|	-4	|	-3	|	-2	|	-1	|	0 	|
//		+===============================================================================================================================================================================+
//
//W powyższym przypadku szukany indeks to '3';
//		
//----------------
//Oceniana będzie poprawność or jakość napisanego kodu. Rozwiązanie proszę odesłać w odpowiedzi na tego maila. 

