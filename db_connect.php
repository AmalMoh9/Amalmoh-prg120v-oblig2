<?php
$servername = "localhost";
$username = "root";
$password = "";  // endres på Dokploy
$dbname = "oblig2"; // endres på Dokploy

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Feil ved tilkobling: " . $conn->connect_error);
}
?>
