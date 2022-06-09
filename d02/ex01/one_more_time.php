#!/usr/bin/php
<?php
    date_default_timezone_set('Europe/Paris');
    
    $day = array(1 => 'lundi', 2 => 'mardi', 3 => 'mercredi', 4 => 'jeudi',
                    5 => 'vendredi', 6 => 'samedi', 7 => 'dimanche');
    
    $month = array(1 => 'janvier', 2 => 'février', 3 => 'mars', 4 => 'avril',
                    5 => 'mai', 6 => 'juin', 7 => 'juillet', 8 => 'août', 9 => 'septembre',
                    10 => 'octobre', 11 => 'novembre', 12 => 'décembre');
    
    if ($argc == 2)
    {
        $date = explode(' ', $argv[1]);
        if (count($date) != 5)
            exit("Wrong Format\n");
        
        $d_pattern = "/^[1-9]$|0[1-9]|[1-2][0-9]|3[0-1]$/";
        $y_pattern = "/^[0-9]{4}$/";
        $t_pattern = "/^([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])$/";

        if (!preg_match($d_pattern, $date[1]) ||
            !preg_match($y_pattern, $date[3]) ||
            !preg_match($t_pattern, $date[4], $date[4])) {
                exit ("Wrong Format\n");
            }
        
        $date[0] = array_search(lcfirst($date[0]), $day);
        $date[2] = array_search(lcfirst($date[2]), $month);

        $time_passed = mktime($date[4][1], $date[4][2], $date[4][3], $date[2], $date[1], $date[3]);
        
        if (date('N', $time_passed) == $date[0] && date('n', $time_passed) == $date[2])
            echo "$time_passed\n";
        else
            echo "Wrong Format\n";
    }
?>