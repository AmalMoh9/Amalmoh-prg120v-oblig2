<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

    $sql = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES ('$brukernavn', '$fornavn', '$etternavn', '$klassekode')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ".$base_url."vis-alle-studenter.php");
        exit();
    } else {
        echo "Feil: " . $conn->error;
    }
}

// Hent klasser til dropdown
$klasse_result = $conn->query("SELECT klassekode, klassenavn FROM klasse");
?>
<h2>Registrer ny student</h2>
<form method="post" action="<?php echo $base_url; ?>registrer-student.php">
    Brukernavn: <input type="text" name="brukernavn"><br>
    Fornavn: <input type="text" name="fornavn"><br>
    Etternavn: <input type="text" name="etternavn"><br>
    Klasse: 
    <select name="klassekode">
        <?php while($row = $klasse_result->fetch_assoc()) {
            echo "<option value='".$row['klassekode']."'>".$row['klassenavn']."</option>";
        } ?>
    </select><br>
    <input type="submit" value="Registrer">
</form>
<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>

 
 

