<?php
include "db.php";

$resultat = $conn->query("SELECT * FROM student");

echo "<h2>Alle studenter</h2>";
echo "<table border='1'><tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klasse</th></tr>";

while ($rad = $resultat->fetch_assoc()) {
    echo "<tr><td>{$rad['brukernavn']}</td><td>{$rad['fornavn']}</td><td>{$rad['etternavn']}</td><td>{$rad['klassekode']}</td></tr>";
}

echo "</table>";
?>


