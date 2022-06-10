<?php
$user = $_SERVER['PHP_AUTH_USER'];
$passwd = $_SERVER['PHP_AUTH_PW'];
if ($user === "zaz" && $passwd === "Ilovemylittleponey") {
    $img = file_get_contents('../img/42.png');
    echo "<html><body>\n";
    echo "Hello Zaz<br />\n";
    echo "<img src='data:image/png;base64," . base64_encode($img) . "'>\n";
    echo "</body></html>\n";
} else {
    header('WWW-Authenticate: Basic realm=\'\'Member area\'\'');
    header('HTTP/1.0 401 Unauthorized');
    echo "<html><body>That area is accessible for members only</body></html>     \n";
}
?>
