<?php
include 'conn.php';

  /*
    请求方式：
      GET or POST
    前端需要提供
      电话号码
      商品ID
      http://localhost/rice/api/delshopping.php?phone=18675933204&goodid=6
    作用：
      删除购物车商品
  */ 
  $pone = $_REQUEST['phone'];
  $goodid = $_REQUEST['goodid'];

  $sql = "DELETE FROM shoppingcar WHERE userid=(SELECT userid FROM user WHERE phone=$pone) AND goodsid=$goodid";
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
