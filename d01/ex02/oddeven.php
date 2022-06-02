#!/usr/bin/php
<?php
    for (;;){
        echo "Enter a number: ";
        $num = fgets(STDIN);
        if ($num){
            $num = trim($num);
            if (!(is_numeric($num))){
                echo "'$num' is not a number\n";
                continue;
            }
            $num = intval($num);
            if ($num % 2 == 1) {
                echo "The number $num is odd\n";
            } else {
                echo "The number $num is even\n";
            }
        }
        else {
            echo "\n";
            exit (0);
        }
    }
?>