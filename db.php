<?php
//Conection DB
session_start();
  
$db = new mysqli("localhost","id8553448_lavi","123456","id8553448_0811member");
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