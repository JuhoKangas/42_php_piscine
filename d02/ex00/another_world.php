#!/usr/bin/php
<?php
    if ($argc < 2)
        exit (0);
    $str = $argv[1];
    $str = trim(preg_replace('/\s+/', ' ', $str));
    echo "$str\n";
?>