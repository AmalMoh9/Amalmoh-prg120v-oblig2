<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

$melding = "";

// Hent alle klasser fra databasen
$klasseResult = $conn->query("SELECT klassekode, klassenavn FROM klasse");
if (!$klasseResult) {
    die("Feil ved henting av klasser: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brukernavn = trim($_POST['brukernavn']);
    $fornavn = trim($_POST['fornavn']);
    $etternavn = trim($_POST['etternavn']);
    $klassekode = $_POST['klassekode'];

    // Sjekk at brukeren har valgt en klasse
    if ($klassekode == "") {
        $melding = "Velg en klasse!";
    } else {
        // Sett inn student i databasen
        $stmt = $conn->prepare("INSERT INTO student (brukernavn, fornavn, etternavn, klassekode) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $brukernavn, $fornavn, $etternavn, $klassekode);

        if ($stmt->execute()) {
            $melding = "Student registrert!";
        } else {
            $melding = "Noe gikk galt: " . $conn->error;
        }

        $stmt->close();
    }
}
?>

<h2>Registrer ny student</h2>
<form method="post" action="<?php echo $base_url; ?>registrer-student.php">
    Brukernavn: <input type="text" name="brukernavn" required><br>
    Fornavn: <input type="text" name="fornavn" required><br>
    Etternavn: <input type="text" name="etternavn" required><br>
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
    <input type="submit" value="Registrer">
</form>

<?php if($melding != "") { echo "<p style='color:red;'>$melding</p>"; } ?>

<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>


 
 

