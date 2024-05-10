<?php 
session_start(); // Start the session
date_default_timezone_set('America/Chicago');
$time = date('g:ia');

if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

if (isset($_GET['message']) && strlen($_GET['message']) > 0) {
    $file = "messages.txt";
    $username = $_SESSION["username"];
    $message = $_GET['message'];
    $content = $username . ": " . $message . " - " . $time . PHP_EOL;
    file_put_contents($file , $content, FILE_APPEND);
    
    $_SESSION['counter']++;
}

// Read the last message from the text file
$file = "messages.txt";
try {
    $lines = file($file);
    $last_line = trim(end($lines));
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Send counter, user ID, and last message back to user
echo $_SESSION['counter'] . ":" . $last_line . ":" .$time;

?>
