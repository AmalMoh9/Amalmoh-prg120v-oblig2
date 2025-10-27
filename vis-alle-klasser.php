<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

$result = $conn->query("SELECT * FROM klasse");
?>
<h2>Alle klasser</h2>
<table border="1">
<tr><th>Kode</th><th>Navn</th><th>Studium</th></tr>
<?php while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row['klassekode']."</td><td>".$row['klassenavn']."</td><td>".$row['studiumkode']."</td></tr>";
} ?>
</table>
<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>


