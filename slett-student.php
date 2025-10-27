<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

if(isset($_GET['klassekode'])) {
    $kode = $_GET['klassekode'];
    $conn->query("DELETE FROM klasse WHERE klassekode='$kode'");
    header("Location: ".$base_url."vis-alle-klasser.php");
    exit();
}

$result = $conn->query("SELECT * FROM klasse");
?>
<h2>Slett klasse</h2>
<ul>
<?php while($row = $result->fetch_assoc()) {
    echo "<li>".$row['klassenavn']." <a href='".$base_url."slett-klasse.php?klassekode=".$row['klassekode']."'>Slett</a></li>";
} ?>
</ul>
<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>



