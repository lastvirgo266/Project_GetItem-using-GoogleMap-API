<?php
include_once "itemDB.php";


isset($_SESSION['userid']);
$id = $_SESSION['userid'];
 
//------------- Search Item information(DB조회) ---------------//
/*
$sql = mq("SELECT * FROM items");
$desc = [];
// look through query
while($row = $sql->fetch_row()){ //fectch_array 에서 고장났음
  // add each row returned into an array
  //array_push($code,$row[0]); //Save Item code
  array_push($desc[$row[0]], $row[1]); //Save Descript
}
*/

  //------------Load map Items ------------//
  $sql = mq("SELECT * FROM mapItem");
  $mapItemInfo = [];

  
  // look through query
  $i = 0;
  while($row = mysqli_fetch_row($sql)){ //fectch_array 에서 고장났음
    $mapItemInfo[$i]->number = $row[0];
    $mapItemInfo[$i]->code = $row[1];
    $mapItemInfo[$i]->latitude = $row[2];
    $mapItemInfo[$i]->longtitude = $row[3];
    $i = $i+1;
  }

  ?>



<script>


</script>


