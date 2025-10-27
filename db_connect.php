<?php
$host = "127.0.0.1";
$user = "ammoh3419";  
$pass = "215fammoh3419";  
$db   = " ammoh3419"; 


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>







