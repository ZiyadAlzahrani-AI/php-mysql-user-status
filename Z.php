<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">

  <title>User Status System</title>

  <link rel="stylesheet" href="status-style.css">
</head>

<body>

<h2>User Status System</h2>

<form action="n.php" method="get" class="user-form">

  <label for="Name">Name:</label>

  <input
    type="text"
    id="Name"
    name="Name"
    placeholder="الاسم"
    required
  >

  <label for="Age">Age:</label>

  <input
    type="number"
    id="Age"
    name="Age"
    placeholder="العمر"
    required
  >

  <input type="submit" value="Submit">

</form>

<?php include "display.php"; ?>

</body>
</html>