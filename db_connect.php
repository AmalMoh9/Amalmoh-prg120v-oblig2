<?php
$host = "localhost";  // Endre om Dokploy har spesifikk DB-host
$user = "root";
$pass = "";
$db = "prg120v";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


