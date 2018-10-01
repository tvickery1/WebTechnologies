<?php
function MakeArray() {
    global $status, $num;
    $num = rand(5, 10);
    $newArray = array();
    for($i = 0; $i < $num; $i++)
        $newArray[] = $i;
    shuffle($newArray);
    $status .= "$num.";
    $num++;
    return newArray;
}

function ShowArray($arr) {
    global $fName, $status, $num;
    $outStr = "";
    foreach($arr as $formName => $formValue) {
        $outStr .= "[$formName] = $formValue<br>";
    }
    $outStr = "$fName you got : <br>" . $outStr; //prefix to front of outStr !
    $status .= "$num.";
    $num++;
    return $outStr;
}

function GenerateNumbers() {
    global $status, $num;
    $gnArray;
    for ($i = 1; $i <= 10; $i++)
    {
        $gnArray[$i] = $i;
    }
    shuffle($gnArray);
    $status .= "$num.";
    $num++;
    return $gnArray;
}

function MakeList($arr) {
    global $status, $num;
    $outStr;
    $outStr = "<ol>";
    for ($i = 0; $i < 10; $i++)
    {
        $outStr .= "<li>$arr[$i]</li>";
    }
    $outStr .= "</ol>";
    $status .= "$num.";
    $num++;
    return $outStr;
}































?>