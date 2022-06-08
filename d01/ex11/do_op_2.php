#!/usr/bin/php
<?php
    if ($argc != 2) {
        echo "Incorrect Parameters\n";
        exit (0);
    }

    function is_operator($op) {
        return ($op === "+" || $op === "-" || $op === "/" || $op === "*" || $op === "%");
    }

    if (preg_match_all('/\D/', $argv[1], $matches)) {
        
        $non_nums = implode($matches[0]);
        $non_nums = trim($non_nums);
        if (strlen($non_nums) > 1)
            exit ("Syntax Error\n");
        if (!is_operator($non_nums))
            exit ("Syntax Error\n");
    }

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