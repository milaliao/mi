<?php
  //引入文件
 include 'conn.php';
 // 接收前端返回的数据
 $phoneNum = $_POST['phoneNum'];
 $pwd = $_POST['pwd'];
 //3查询数据库语句
 $sql = "SELECT * FROM user WHERE phone='$phoneNum'";
 //4执行数据库语句
 $result = $conn->query($sql);
//  var_dump($result);
//获取查询到数据条数
$number = $result->num_rows;
//判断数据条数
 if($number === 1){
   echo '{"error":1,"msg":"用户已经存在"}';
 }else{//表示用户手机号不存在，可以注册
  //编写数据库语句，将手机号直接插入到数据库；
  $sql2 = "INSERT into  user value (null,'','$pwd',$phoneNum)";
  // var_dump($sql2);
  // 执行数据库
  $result2 = $conn->query($sql2);
  if($result2){
    echo'{"error":0,"msg":"注册成功"}';
  }else{
    echo '{"echo":2,"msg":"注册失败"}';
  }
 }

?>