<?php
$cookie_name = "ReturnGuestWelcome";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    if(!isset($_COOKIE[$cookie_name])) {
        echo ("<p>$cookie_name</p>");
    } else {
        echo ("<p>$cookie_name</p>");
        echo ("<p>Value is: " . $_COOKIE[$cookie_name]."</p>");
    }
?>