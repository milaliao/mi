<?php
  //建立数据库连接
  include 'conn.php';
  //接收前端传送来的数据
  $username = $_POST['user'];
  $password = $_POST['pwd'];
  //3查询数据库语句
  $sql = "SELECT * FROM user WHERE phone = '$username' and `password` ='$password'";
  // var_dump($sql);
  $result = $conn->query($sql);
  //4 直接获取数据库条数
  $number = $result->num_rows;
  $data = array(
    "err" => 0,
    "msg" => ""
  );
  if($number === 1){
    $data['msg'] = "登录成功";
  }else{
    $data['err'] = 1 ;
    $data['msg'] = "用户名密码失败";
  }
  echo json_encode($data);
?>