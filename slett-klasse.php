<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

$melding = "";

// Hent alle klasser for listeboks
$klasseResult = $conn->query("SELECT klassekode, klassenavn FROM klasse");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = $_POST['klassekode'];

    if ($klassekode == "") {
        $melding = "Velg en klasse å slette!";
    } else {
        // Sjekk om det finnes studenter i klassen
        $stmt_check = $conn->prepare("SELECT brukernavn FROM student WHERE klassekode = ?");
        $stmt_check->bind_param("s", $klassekode);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $melding = "Kan ikke slette: Det finnes studenter i denne klassen.";
        } else {
            $stmt_delete = $conn->prepare("DELETE FROM klasse WHERE klassekode = ?");
            $stmt_delete->bind_param("s", $klassekode);

            if ($stmt_delete->execute()) {
                $melding = "Klassen er slettet!";
            } else {
                $melding = "Noe gikk galt: " . $conn->error;
            }
            $stmt_delete->close();

            // Oppdater listeboksen etter sletting
            $klasseResult = $conn->query("SELECT klassekode, klassenavn FROM klasse");
        }
        $stmt_check->close();
    }
}
?>

<h2>Slett klasse</h2>
<form method="post" action="<?php echo $base_url; ?>slett-klasse.php">
    Klasse:
    <select name="klassekode" required>
        <?php
        if ($klasseResult->num_rows > 0) {
            while($row = $klasseResult->fetch_assoc()) {
                echo "<option value='{$row['klassekode']}'>{$row['klassekode']} - {$row['klassenavn']}</option>";
            }
        } else {
            echo "<option value=''>Ingen klasser registrert</option>";
        }
        ?>
    </select><br>
    <input type="submit" value="Slett">
</form>

<?php if($melding != "") { echo "<p style='color:red;'>$melding</p>"; } ?>

<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>


     





