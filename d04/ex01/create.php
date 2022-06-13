<?php
    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK") {
        
        // Check the password folder and file, create them if they do not exist
        if (!file_exists('../private'))
            mkdir('../private');
        if (!file_exists('../private/passwd'))
            file_put_contents('../private/passwd', '');
        
        $accounts = file_get_contents('../private/passwd');
        $users = unserialize($accounts);

        // Check if user already exists
        $user_exists = false;
        if ($users) {
            foreach ($users as $key=>$value) {
                if ($value['login'] === $_POST['login'])
                    $user_exists = true;
            }
        }

        // Create new user if the username is not taken
        if (!$user_exists) {
            $new_user['login'] = $_POST['login'];
            $new_user['passwd'] = hash('whirlpool', $_POST['passwd']);
            $users[] = $new_user;
            file_put_contents('../private/passwd', serialize($users));
            echo "OK\n";
        } else {
            echo "ERROR\n";
        }
    } else {
        echo "ERROR\n";
    }
?>