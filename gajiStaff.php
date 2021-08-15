<?php 
  require 'db.php';

  if( !isset($_GET['id']) ) {
    header("Location: index.php");
  }

  $this_staff = mysqli_query($db, "SELECT * FROM staff WHERE id = $_GET[id]");
  $data_staff = mysqli_fetch_assoc($this_staff);
  // foreach($data_staff as $data_s) {
  //   echo $data_s;
  // }
  $name_staff = $data_staff['name'];

  if( isset($_POST['submit']) ) {
    $gaji = $_POST['total_b'];
    $staff_id = $_GET['id'];

    $insert = mysqli_query($db, "INSERT INTO salary VALUES ('', '$staff_id', '$gaji')");

    if( $insert && mysqli_affected_rows($db) > 0 ) {
      echo "
        <script>
          alert('Memberi gaji success');
          window.location.href = 'index.php';
        </script>
        ";
    } else {
      $err = mysqli_error($db);
      echo $err;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <link rel="stylesheet" href="./assets/gajiStaff.css">

  <title>Gaji Staff</title>
</head>
<body>
  <div class="gaji-staff-container container mt-4 bg-light p-5">
    <h3 class="text-center mb-4">Gaji</h3>
    <div class="form-container">
      <form action="" method="post">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="name" readonly="readonly" value="<?= $name_staff; ?>">
        </div>
        <div class="mb-3">
          <label for="salary" class="form-label">Gaji</label>
          <input type="number" name="salary" class="form-control" id="salary">
        </div>
        <div class="mb-3">
          <label for="salary" class="form-label">Tunjangan (20%)</label>
          <input type="number" name="tunjangan" class="form-control" id="tunjangan" readonly="readonly">
        </div>
        <div class="mb-3">
          <label for="salary" class="form-label">Total (kotor)</label>
          <input type="number" name="total_k" class="form-control" id="total_k" readonly="readonly">
        </div>
        <div class="mb-3">
          <label for="salary" class="form-label">Total (bersih)</label>
          <input type="number" name="total_b" class="form-control" id="total_b" readonly="readonly">
          <div class="form-text">Setelah dipotong pajak 5%</div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </div>

  <script>
    const gaji = document.getElementById('salary');
    const tunjangan = document.getElementById('tunjangan');
    const total_k = document.getElementById('total_k');
    const total_b = document.getElementById('total_b');

    gaji.addEventListener("change", function () {
      let allowance = parseInt(gaji.value) * 20 / 100;
      tunjangan.value = allowance;
      total_k.value = parseInt(gaji.value) + allowance;
      const tax = parseInt(total_k.value) * 5 /100;
      total_b.value = parseInt(total_k.value) - tax;
    });
  </script>
</body>
</html>