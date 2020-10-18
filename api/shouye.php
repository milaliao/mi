<?php
  include 'conn.php';
  //
  $sql = "SELECT * from list" ;
  $result = $conn->query($sql);
 //
  $all = $result->fetch_all(MYSQLI_ASSOC);
  // var_dump($all);
  echo json_encode($all);
?>