<?php
/*The purpose of this file is for me to use to display messages sent from people
using the contact feature. */
include 'include.php';
connectToDB($conn);
printMessages($conn);
?>