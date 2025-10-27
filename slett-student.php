<?php
include "db_connect.php";

$message = "";

if(isset($_POST['brukernavn'])) {
    $bruker = $_POST['brukernavn'];
    $conn->query("DELETE FROM student WHERE brukernavn='$bruker'");
    $message = "Student slettet!";
}

$result = $conn->query("SELECT * FROM student");
?>

<h2>Slett student</h2>
<?php if($message) echo "<p>$message</p>"; ?>
<form method="post" onsubmit="return confirm('Er du sikker på at du vil slette studenten?');">
    Velg student å slette:
    <select name="brukernavn" required>
        <?php while($row = $result->fetch_assoc()): ?>
            <option value="<?= $row['brukernavn'] ?>"><?= $row['fornavn'] ?> <?= $row['etternavn'] ?></option>
        <?php endwhile; ?>
    </select>
    <input type="submit" value="Slett student">
</form>




