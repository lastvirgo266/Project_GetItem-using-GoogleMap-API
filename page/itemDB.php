<?php
//Conection Item DB
//echo "<script>alert('출력 제대로 되고있냐?? : ".$row[0].$row[1].$row[2]."');</script>"; //PHP 변수 alert  출력시키기
//for($j = 0; $j < count($data[$i]); $j++){
//  echo $i."번째 줄 : ".$data[$i][$j]."<br/>"; //Test
//}

session_start();
$db = new mysqli("localhost","id8553448_user","123456","id8553448_itemdb");
$db->set_charset("utf8");

if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}


//Query
function mq($sql){
  global $db;
  $result = mysqli_query($db, $sql);
  if ( false===$result ) {
  printf("error: %s\n", mysqli_error($db));
  }
  return $result;
}

?>