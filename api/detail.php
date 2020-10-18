<?php
// 建立数据库连接
include 'conn.php';

// 接收前端传送来的数据
$shopid = $_GET['id'];
$imgs = $_GET['imgSrc'];
$desc = $_GET['desc'];
$price = $_GET['price'];


$sql = "SELECT * FROM shoppingcar WHERE goodsid = $shopid";
$result = $conn->query($sql);
// var_dump($result);
$all = $result->fetch_all(MYSQLI_ASSOC);

// var_dump($all[0]['shuliang']);
$phone = $_COOKIE['users'];
// var_dump($_COOKIE['users']);
$number = $result->num_rows;

$success = array(
  'err' => 0,
  'msg'=> '加入购物车成功'
);
$error = array(
  'err' => 1,
  'msg'=> '加入购物车失败'
);

if($number === 1){
  $num = $all[0]['shuliang']+1;
  $sql2 =  "UPDATE shoppingcar SET shuliang=$num WHERE goodsid=$shopid";
  $bool = $conn->query($sql2);
  if($bool){
    echo json_encode($success);
  }else {
    echo json_encode($error);
  }
  

}else{
  $sql3 = "SELECT userid FROM user WHERE phone=$phone";
  $result2 = $conn->query($sql3);
  // 收集用户结果集
  $userresult = $result2->fetch_all(MYSQLI_ASSOC);
  $userid = $userresult[0]['userid'];
  $sql4 = "INSERT INTO shoppingcar VALUES($shopid,'$imgs','$desc','$price',1,$userid)";
  $bool = $conn->query($sql4);
  if($bool){
    echo json_encode($success);
  }else {
    echo json_encode($error);
  }
}


?> 