<?php 
  require 'db.php';

  if( !isset($_GET['id']) ) {
    header("Location: index.php");
  }

  $staff_id = $_GET['id'];
  $staff = query("SELECT * FROM staff WHERE id = $staff_id");
  $staff_name = $staff[0]['name'];

  $salary = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM salary WHERE staff_id = $staff_id"));
  $salary_staff = $salary['salary'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <title>Detail Gaji Staff</title>
</head>
<body>
  <div class="container mt-5 p-5 bg-light" style="max-width: 70vh;">
    <form>
      <legend class="text-center mb-4">Detail Gaji Staff</legend>
      <fieldset disabled>
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" id="name" class="form-control" value="<?= $staff_name; ?>">
        </div>
        <div class="mb-3">
          <label for="salary" class="form-label">Gaji</label>
          <input id="salary" class="form-control" value="<?= $salary_staff; ?>"></input>
        </div>
        <a href="index.php"><span class="btn btn-dark">Kembali</span></a>
      </fieldset>
    </form>
  </div>
</body>
</html>