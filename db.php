<?php 

  $server = "localhost";
  $user = "root";
  $password = "";
  $db = "db_salary";

  $db = mysqli_connect($server, $user, $password, $db);

  function query($query) {
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    while( $data = mysqli_fetch_assoc($result) ) {
      $rows[] = $data;
    }

    return $rows;
  }

?>