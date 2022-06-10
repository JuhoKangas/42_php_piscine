<?php
    $name = $_GET['name'];
    $value = $_GET['value'];
    $action = $_GET['action'];

    switch ($action) {
        case 'set':
            setcookie($name, $value, time()+3600);
            break;
            
        case 'get':
            if (isset($_COOKIE[$name]))
                echo $_COOKIE[$name] . "\n";
            break;
            
        case 'del':
            unset($_COOKIE[$name]);
            setcookie($name, '', time() - 3600);
            break;
    }
?>