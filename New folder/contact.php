<?php

$host = 'localhost';
$user = 'username';
$password = 'password';
$dbname = 'database_name';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$sql = "SELECT email FROM users WHERE receive_updates = 1";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $to = $row['email'];
    $subject = 'Update from My Website';
    $message = 'This is an update from My Website';
    $headers = 'From: info@mywebsite.com' . "\r\n";
    
    mail($to, $subject, $message, $headers);
}

// Close the connection
mysqli_close($conn);

?>
