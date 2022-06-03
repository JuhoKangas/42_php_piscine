#!/usr/bin/php
<?php
    if ($argc != 2) {
        echo "Incorrect Parameters\n";
        exit (0);
    }

    // TODO regex check for syntax error
    if (!preg_match('/[0-9\+\-\/\%\*]*/', $argv[1]))
        exit ("Syntax Error\n");

    $regex = '#(?<val1>.*)(?<operator>[\+\-\/\*\%])(?<val2>.*)#';

    preg_match( $regex, $argv[1], $match);

    if (count($match)) {
        switch ($match['operator']) {
            case '+':
                $result = $match['val1'] + $match['val2'];
                break;
            case '-':
                $result = $match['val1'] - $match['val2'];
                break;
            case '/':
                $result = $match['val1'] / $match['val2'];
                break;
            case '*':
                $result = $match['val1'] * $match['val2'];
                break;
            case '%':
                $result = $match['val1'] % $match['val2'];
                break;
        }
        echo "$result\n";
    }
    ?>