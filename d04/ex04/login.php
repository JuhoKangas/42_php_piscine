<?php
    session_start();

    include("auth.php");

    $authenticated = FALSE;

    if ($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd'])) {
        $_SESSION['loggued_on_user'] = $_POST['login'];
        $authenticated = TRUE;
    } else {
        $_SESSION['loggued_on_user'] = '';
        echo "ERROR\n";
        header('Location: index.html');
    }
?>
<?php if ($authenticated) : ?>
    <iframe src="chat.php" frameborder="1" width="100%" height="550px"></iframe>
    <iframe src="speak.php" frameborder="1" width="100%" height="50px"></iframe>
<?php endif ?>