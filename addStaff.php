<?php

  if(isset($_POST["add"])) {
    $name = $_POST["name"];
    $umur = $_POST["umur"];
    $role = $_POST["role"];

    $values = [$name, $umur, $role];

    for($i = 0; $i < count($values); $i++) {
      if($values[$i] == "") {
        echo "<script>alert('Please complete : ". array_keys($_POST)[$i] ."')</script>";
      } else {
        require 'db.php';

        $insert = mysqli_query($db, "INSERT INTO staff VALUES ('', '$name', '$umur', '$role')");

        if( $insert && mysqli_affected_rows($db) > 0 ) {
          echo "
            <script>
              alert('Add staff success');
              window.location.href = 'index.php';
            </script>
            ";
        } else {
          $err = mysqli_error($db);
          echo $err;
        }
      }
    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/style.css">
  <title>New Staff</title>
</head>
<body>
  <div class="add-staff-container">
    <h3>New Staff</h3>
    <div class="form-container">
      <form action="" method="post">
        <div class="row">
          <label for="name">Nama</label>
          <input type="text" name="name" id="name">
        </div>

        <div class="row">
          <label for="umur">Umur</label>
          <input type="number" name="umur" id="umur">
        </div>

        <div class="row">
          <label for="role">Role</label>
          <input type="text" name="role" id="role">
        </div>
  
        <button type="submit" name="add">Tambah staff</button>
      </form>
    </div>
  </div>

  <script src="./assets/script.js"></script>
</body>
</html>