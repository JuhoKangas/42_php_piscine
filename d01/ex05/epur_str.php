#!/usr/bin/php
<?php
    if ($argc != 2)
        exit (0);
    $str = $argv[1];
    $str = trim($str);
    $str = preg_replace('/ +/', ' ', $str);
    echo ($str);
    echo "\n";
?>