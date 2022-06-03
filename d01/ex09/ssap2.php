#!/usr/bin/php
<?php
    if ($argc < 2)
        exit (0);
    
    $arr = array();
    
    function compare($x, $y) {
        $comparisonString = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
        for ($i = 0; $i < strlen($x) || $i < strlen($y); $i++){
            $xIndex = stripos($comparisonString, $x[$i]);
            $yIndex = stripos($comparisonString, $y[$i]);
            if ($xIndex > $yIndex)
                return (1);
            else if ($xIndex < $yIndex)
                return (-1);
        }
    }

    foreach(array_slice($argv, 1) as $arg) {
        $tempArr = preg_split("/\s+/", trim($arg));
        if ($tempArr[0] != "");
            $arr = array_merge($arr, $tempArr);
    }

    usort($arr, "compare");

    foreach ($arr as $el) {
        echo "$el\n";
    }
?>