<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST['klassekode'];
    $klassenavn = $_POST['klassenavn'];
    $studiumkode = $_POST['studiumkode'];

    $sql = "INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES ('$klassekode', '$klassenavn', '$studiumkode')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ".$base_url."vis-alle-klasser.php");
        exit();
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>
<h2>Registrer ny klasse</h2>
<form method="post" action="<?php echo $base_url; ?>registrer-klasse.php">
    Klassekode: <input type="text" name="klassekode"><br>
    Klassenavn: <input type="text" name="klassenavn"><br>
    Studiumkode: <input type="text" name="studiumkode"><br>
    <input type="submit" value="Registrer">
</form>
<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>


