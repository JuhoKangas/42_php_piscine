#!/usr/bin/php
<?php
    if ($argc != 4)
	{
        echo "Incorrect Parameters\n";
		exit(0);
	}
    $num1 = trim($argv[1]);
    $num2 = trim($argv[3]);
    $operator = trim($argv[2]);

    switch ($operator) {
        case '+':
            echo $num1 + $num2 . "\n";
            break;
        case '-':
            echo $num1 - $num2 . "\n";
            break;
        case '/':
            echo $num1 / $num2 . "\n";
            break;
        case '*':
            echo $num1 * $num2 . "\n";
            break;
        case '%':
            echo $num1 % $num2 . "\n";
            break;
    }
?>