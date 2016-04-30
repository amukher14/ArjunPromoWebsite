<?php
include 'include.php';
echo ("<link rel='stylesheet' href='CSS/grayscale.css' type='text/css'>");

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

connectToDB($conn);
sendFormsToDB($conn, $name, $email, $message);

?>