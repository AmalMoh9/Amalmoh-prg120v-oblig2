<?php
include '../db_connect.php';

if (isset($_POST['brukernavn'])) {
  $bn = $_POST['brukernavn'];
  $conn->query("DELETE FROM student WHERE brukernavn='$bn'");
  echo "Student slettet.";
}

$result = $conn->query("SELECT * FROM student");
?>

<h2>Slett student</h2>
<form method="post">
  <select name="brukernavn">
    <?php while ($row = $result->fetch_assoc()) { ?>
      <option value="<?= $row['brukernavn'] ?>">
        <?= $row['fornavn'] . " " . $row['etternavn'] ?>
      </option>
    <?php } ?>
  </select>
  <input type="submit" value="Slett">
</form>




