<?php

$host = "HER_SKRIVER_DU_HOST";      // f.eks. db eller det som står i Dokploy
$user = "HER_SKRIVER_DU_USERNAME";  // ammoh3419
$pass = "HER_SKRIVER_DU_PASSWORD";  // 215fammoh3419
$db   = "HER_SKRIVER_DU_DBNAME";    // ammoh3419


$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>




