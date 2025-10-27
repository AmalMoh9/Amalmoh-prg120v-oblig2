<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

$result = $conn->query("SELECT s.brukernavn, s.fornavn, s.etternavn, k.klassenavn 
                        FROM student s 
                        JOIN klasse k ON s.klassekode = k.klassekode");
?>
<h2>Alle studenter</h2>
<table border="1">
<tr><th>Brukernavn</th><th>Fornavn</th><th>Etternavn</th><th>Klasse</th></tr>
<?php while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['brukernavn']."</td><td>".$row['fornavn']."</td><td>".$row['etternavn']."</td><td>".$row['klassenavn']."</td></tr>";
} ?>
</table>
<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>



