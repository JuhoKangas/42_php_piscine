<?php
    session_start();
    date_default_timezone_set("Europe, Helsinki");

    if (!$_SESSION['loggued_on_user']) {
        echo "ERROR\n";
        exit;
    }
    if (file_exists('../private/chat'))
        $chat = unserialize(file_get_contents('../private/chat'));
?>

<?php foreach($chat as $message): ?>
    [<?php echo date('H:i', $message['time']) ?>] <b><?php echo $message['login']?></b>: <?php echo $message['msg']?><br />
<?php endforeach ?>