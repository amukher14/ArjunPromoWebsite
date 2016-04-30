<?php
header('Content-disposition: attachment;
filename=ArjunMukherjee.Resume2016.pdf');
header('Content-type: application/pdf');
readfile('ArjunMukherjee.Resume2016.pdf');
?>