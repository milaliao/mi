<?php
  include 'conn.php';
  /*
    请求方式：
      GET or POST
    前端需要提供
      电话号码
      商品ID
      商品加减后的数量
      http://localhost/rice/api/addshopping.php?phone=18675933204&goodid=6&num=16
    作用：
      购物车商品数量修改
  */ 
  $pone = $_REQUEST['phone'];
  $goodid = $_REQUEST['goodid'];
  $num = $_REQUEST['num'];
  
  $sql = "UPDATE shoppingcar SET shuliang=$num WHERE userid=(SELECT userid FROM user WHERE phone=$pone) AND goodsid=$goodid";
  $res = $conn->query($sql);
  $data = array(
    'err' => 0,
    'msg' => '成功'
  );
  if($res){
    echo json_encode($data);
  } else {
    $data['err'] = 1;
    $data['msg'] = "失败";
    echo json_encode($data);
  }

?>