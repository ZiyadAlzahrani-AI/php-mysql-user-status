<?php

require "config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

/* Toggle status between 0 and 1 */
if (isset($_GET["toggle"])) {

  $id = (int) $_GET["toggle"];

  $sql = "UPDATE `User`
          SET `Status` = IF(`Status` = 0, 1, 0)
          WHERE `ID` = $id";

  $conn->query($sql);

  header("Location: Z.php");
  exit;
}

/* Get all records from the User table */
$sql = "SELECT `ID`, `Name`, `Age`, `Status`
        FROM `User`
        ORDER BY `ID` DESC";

$result = $conn->query($sql);

?>

<h2>User Records</h2>

<table class="users-table">

  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Status</th>
    <th>Action</th>
  </tr>

  <?php
  if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
  ?>

      <tr>

        <td><?php echo $row["ID"]; ?></td>

        <td><?php echo htmlspecialchars($row["Name"]); ?></td>

        <td><?php echo $row["Age"]; ?></td>

        <td>
          <span class="<?php echo $row["Status"] == 1 ? "status-on" : "status-off"; ?>">
            <?php echo $row["Status"]; ?>
          </span>
        </td>

        <td>
          <a
            class="toggle-button"
            href="Z.php?toggle=<?php echo $row["ID"]; ?>"
          >
            Toggle
          </a>
        </td>

      </tr>

  <?php
    }

  } else {
  ?>

    <tr>
      <td colspan="5">No records found</td>
    </tr>

  <?php
  }
  ?>

</table>

<?php
$conn->close();
?>