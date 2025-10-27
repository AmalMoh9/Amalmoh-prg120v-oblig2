<?php
include "db.php";

$resultat = $conn->query("SELECT * FROM klasse");

echo "<h2>Alle klasser</h2>";
echo "<table border='1'><tr><th>Kode</th><th>Navn</th><th>Studium</th></tr>";

while ($rad = $resultat->fetch_assoc()) {
    echo "<tr><td>{$rad['klassekode']}</td><td>{$rad['klassenavn']}</td><td>{$rad['studiumkode']}</td></tr>";
}

echo "</table>";
?>


