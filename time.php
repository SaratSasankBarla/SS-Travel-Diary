<?php
date_default_timezone_set('America/Chicago');
session_start();


// Get current date and time
$date = date("n/j/y"); // Format Month/Day/Year
$time = date('g:ia');

// Send response
echo "$date<br>$time";
