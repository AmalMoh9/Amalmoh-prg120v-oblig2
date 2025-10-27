<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

$melding = "";

// Hent alle studenter fra databasen
$studentResult = $conn->query("SELECT brukernavn, fornavn, etternavn FROM student");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = $_POST['brukernavn'];

    if ($brukernavn == "") {
        $melding = "Velg en student å slette!";
    } else {
        $stmt_delete = $conn->prepare("DELETE FROM student WHERE brukernavn = ?");
        $stmt_delete->bind_param("s", $brukernavn);

        if ($stmt_delete->execute()) {
            $melding = "Studenten er slettet!";
        } else {
            $melding = "Noe gikk galt: " . $conn->error;
        }
        $stmt_delete->close();

        // Oppdater listen etter sletting
        $studentResult = $conn->query("SELECT brukernavn, fornavn, etternavn FROM student");
    }
}
?>

<h2>Slett student</h2>
<form method="post" action="<?php echo $base_url; ?>slett-student.php">
    Student:
    <select name="brukernavn" required>
        <?php
        if ($studentResult->num_rows > 0) {
            while($row = $studentResult->fetch_assoc()) {
                echo "<option value='{$row['brukernavn']}'>{$row['brukernavn']} - {$row['fornavn']} {$row['etternavn']}</option>";
            }
        } else {
            echo "<option value=''>Ingen studenter registrert</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Slett">
</form>

<?php if($melding != "") { echo "<p style='color:red;'>$melding</p>"; } ?>

<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>





