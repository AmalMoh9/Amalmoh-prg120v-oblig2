<?php
$base_url = '/app/ammoh3419-Amalmoh-prg120v-oblig2/';
include "db_connect.php";

$melding = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klassekode = trim($_POST['klassekode']);
    $klassenavn = trim($_POST['klassenavn']);
    $studiumkode = trim($_POST['studiumkode']);

    // Sjekk om klassekode allerede finnes
    $stmt = $conn->prepare("SELECT klassekode FROM klasse WHERE klassekode = ?");
    $stmt->bind_param("s", $klassekode);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $melding = "Feil: Denne klassekoden finnes allerede. Velg en annen.";
    } else {
        $stmt_insert = $conn->prepare("INSERT INTO klasse (klassekode, klassenavn, studiumkode) VALUES (?, ?, ?)");
        $stmt_insert->bind_param("sss", $klassekode, $klassenavn, $studiumkode);
        if ($stmt_insert->execute()) {
            header("Location: ".$base_url."vis-alle-klasser.php");
            exit();
        } else {
            $melding = "Noe gikk galt: " . $conn->error;
        }
        $stmt_insert->close();
    }
    $stmt->close();
}
?>

<h2>Registrer ny klasse</h2>
<form method="post" action="<?php echo $base_url; ?>registrer-klasse.php">
    Klassekode: <input type="text" name="klassekode"><br>
    Klassenavn: <input type="text" name="klassenavn"><br>
    Studiumkode: <input type="text" name="studiumkode"><br>
    <input type="submit" value="Registrer">
</form>

<?php if($melding != "") { echo "<p style='color:red;'>$melding</p>"; } ?>

<a href="<?php echo $base_url; ?>index.php">Tilbake til meny</a>




