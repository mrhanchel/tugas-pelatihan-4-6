<?php 
  require 'db.php';

  $staff = query("SELECT * FROM staff");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/style.css">

  <title>Staff List</title>
</head>
<body>
  <div class="container">
    <h3 style="margin-top: 3rem;">Staff List</h3>
    <div class="table-container">
      <a href="addStaff.php" class="tambah-staff">Tambah Staff</a>
      <table cellpadding=10 cellspacing=0>
        <thead bgcolor="#green">
          <th>No</th>
          <th>Nama</th>
          <th>Umur</th>
          <th>Role</th>
          <th>Aksi</th>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach( $staff as $s ) : ?>
          <tr>
            <td><?= $no ?></td>
            <td><?= $s['name']; ?></td>
            <td><?= $s['umur']; ?></td>
            <td><?= $s['role']; ?></td>
            <td>
              <a href="gajiStaff.php?id=<?= $s['id']; ?>">Beri gaji</a>
              <a href="lihatGajiStaff.php?id=<?= $s['id']; ?>">Lihat Gaji</a>
            </td>
          </tr>
          <?php $no++ ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>