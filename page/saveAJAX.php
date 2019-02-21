<?php
session_start();
// ---------------- Load user info --------------------//
  //name
  //101 100 104
  //1 2 3

//fopen back slash!!
$id = $_SESSION['userid'];


  $member_info = $id.".txt";
  $fp = fopen("../member/member_info/$member_info","w"); // @fopen도 가능 여기서 @는 오류가 나도 그냥 무시하고 진행한다는 의미
  if(!$fp) {
      echo 'Could not processed!</body></html>';
      exit;
  }
 
  //Get name
$name = $_POST['name'];
$items = $_POST['items'];
$itemsAmount =  $_POST['itemsAmount'];

//Save name
fwrite($fp,$name."\n");

//Save item code
for($i =0; $i<count($items); $i++){
  if($itemsAmount[$i] !== '0'){
    fwrite($fp,$items[$i]." ");
  }
}

fwrite($fp,"\n");

//Save itmeAmount code
for($i =0; $i<count($itemsAmount); $i++){
  if($itemsAmount[$i] !== '0'){
    fwrite($fp,$itemsAmount[$i]." ");
  }
}


fclose($fp);
?>