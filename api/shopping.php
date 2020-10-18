<?php
  include 'conn.php';
  $phone = $_POST['user'];

  $sql = "SELECT * FROM shoppingcar WHERE userid=(SELECT userid FROM user WHERE phone=$phone)";

  $res = $conn->query($sql);

  $data = $res->fetch_all(MYSQLI_ASSOC);

  echo json_encode($data);





?>