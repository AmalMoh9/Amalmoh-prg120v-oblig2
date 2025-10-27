<?php
include "db.php";

// Hent klasser for listeboks
$klasseresultat = $conn->query("SELECT klassekode FROM klasse");
?>

<form method="post">
    Brukernavn: <input type="text" name="brukernavn" required><br>
    Fornavn: <input type="text" name="fornavn" required><br>
    Etternavn: <input type="text" name="etternavn" required><br>
    Klassekode:
    <select name="klassekode">
        <?php while($rad = $klasseresultat->fetch_assoc()): ?>
            <option value="<?= $rad['klassekode'] ?>"><?= $rad['klassekode'] ?></option>
        <?php endwhile; ?>
    </select><br>
    <input type="submit" value="Registrer student">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $b = $_POST['brukernavn'];
    $f = $_POST['fornavn'];
    $e = $_POST['etternavn'];
    $k = $_POST['klassekode'];

    $sql = "INSERT INTO student VALUES ('$b', '$f', '$e', '$k')";
    if ($conn->query($sql)) {
        echo "Student registrert!";
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>
 
 

