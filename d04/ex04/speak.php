<?php
    session_start();

    if(!$_SESSION['loggued_on_user']) {
        echo "ERROR\n";
        exit;
    }
    
    if ($_POST['msg']) {
        
        if (!file_exists('../private'))
            mkdir('../private');
        if (!file_exists('../private/chat'))
            file_put_contents('../private/chat', '');
        
        $chat = unserialize(file_get_contents('../private/chat'));

        $chat_file = fopen('../private/chat', 'w');
        flock($chat_file, LOCK_EX);
        $message['login'] = $_SESSION['loggued_on_user'];
        $message['time'] = time();
        $message['msg'] = $_POST['msg'];
        $chat[] = $message;
        file_put_contents('../private/chat', serialize($chat));
        fclose($chat_file);
    }
?>

<html>
    <head>
    <script>top.frames['chat'].location = 'chat.php';</script>
    </head>

    <body>
        <form action="speak.php" method="post">
            <input type="text" name="msg" value="" />
            <input type="submit" name="submit" value="send" />
        </form>
    </body>
</html>