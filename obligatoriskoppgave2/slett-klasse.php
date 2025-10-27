<?php
include "db.php";

// Hent liste
$klasser = $conn->query("SELECT klassekode FROM klasse");
?>

<form method="post">
    Velg klasse å slette:
    <select name="klassekode">
        <?php while ($rad = $klasser->fetch_assoc()): ?>
            <option value="<?= $rad['klassekode'] ?>"><?= $rad['klassekode'] ?></option>
        <?php endwhile; ?>
    </select>
    <input type="submit" value="Slett">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['klassekode'];
    $slett = "DELETE FROM klasse WHERE klassekode = '$kode'";

    if ($conn->query($slett)) {
        echo "Klasse slettet.";
    } else {
        echo "Feil: " . $conn->error;
    }
}
?>




