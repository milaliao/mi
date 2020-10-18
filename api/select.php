<?php
  include 'conn.php';

  $sql = "SELECT * FROM shoppingcar";

  $res = $conn->query($sql);

  $data = $res->fetch_all(MYSQLI_ASSOC);

  echo json_encode($data);





?>