<?php
include 'include.php';
echo ("<link rel='stylesheet' href='CSS/grayscale.css' type='text/css'>");

$userSelection = $_POST["galaxy"]; //the values of the radio button, are the col names in mySQL DB
sendPollToDB($conn, $userSelection);
showPollResults($conn);
?>