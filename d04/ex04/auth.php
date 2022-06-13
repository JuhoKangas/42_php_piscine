<?php
    function auth($login, $passwd) {
        $accounts = unserialize(file_get_contents('../private/passwd'));

        // var_dump($accounts);
        foreach ($accounts as $user=>$value) {
            if ($login === $value['login'] && hash('whirlpool', $passwd) === $value['passwd']) {
                return (TRUE);
            }
        }
        return (FALSE);
    }
?>
