#!/usr/bin/php
<?php
    if ($argc < 2)
        exit (0);
    $str = preg_replace('/\s+/', ' ', $argv[1]);
    $str = trim($str);
    $arr = explode(' ', $str);
    if (count($arr) > 1) {
        $firstWord = array_shift($arr);
        array_push($arr, $firstWord);
    }
    $rostring = implode(' ', $arr);
    echo "$rostring\n";
?>