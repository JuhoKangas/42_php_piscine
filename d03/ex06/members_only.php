<?php
if ($_SERVER['PHP_AUTH_USER'] !== "zaz" && $_SERVER['PHP_AUTH_PW'] !== "Ilovemylittleponey") {
    header('WWW-Authenticate: Basic realm=\'\'Member area\'\'');
    header('HTTP/1.0 401 Unauthorized');
    echo "<html><body>That area is accessible for members only</body></html>     \n";
    exit ;
} else {
    $img = file_get_contents('../img/42.png');
    echo "<html><body>\n";
    echo "Hello Zaz<br />\n";
    echo "<img src='data:image/png;base64," . base64_encode($img) . "'>\n";
    echo "</body></html>\n";
}
?>
