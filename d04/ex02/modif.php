<?php
    if ($_POST['login'] && $_POST['newpw'] && $_POST['oldpw'] && $_POST['submit'] == "OK") {
        
        $accounts = unserialize(file_get_contents('../private/passwd'));

        $user_found = false;
        
        // Check if user credentials and passwords match, if match -> update the password for that user
        foreach ($accounts as $user=>$value) {
            if ($value['login'] === $_POST['login'] && $value['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
                $accounts[$user]['passwd'] = hash('whirlpool', $_POST['newpw']);
                $user_found = true;
            }
        }
        
        // Push the updated array into ../private/passwd
        if ($user_found) {
            file_put_contents('../private/passwd', serialize($accounts));
            echo "OK\n";
        } else {
            echo "ERROR\n";
        }
    } else {
        echo "ERROR\n";
    }
?>
