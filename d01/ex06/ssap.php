#!/usr/bin/php
<?php
    if ($argc < 2)
        exit (0);
    $str = "";
    for ($i = 1; $i < $argc; $i++){
        $tmp = trim(preg_replace('/\s+/', ' ', $argv[$i]));
        $str .= "$tmp ";
    }
    $str = trim($str);
    $arr = explode(' ', $str);
    sort(($arr));
    for ($j = 0; $j < count($arr); $j++)
        echo "$arr[$j]\n";
?>