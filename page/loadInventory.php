<?php 
include_once "itemDB.php";

// ---------------- Load user info --------------------//
  //name
  //101 100 104
  //1 2 3

  //fopen back slash!!
$id = $_SESSION['userid'];


  $member_info = $id.".txt";
  $fp = fopen("../member/member_info/$member_info","r"); // @fopen도 가능 여기서 @는 오류가 나도 그냥 무시하고 진행한다는 의미
  if(!$fp) {
      echo 'Could not processed!</body></html>';
      exit;
  }
 
  //Get name
$name = [];
$items = [];
$itemsAmount =  [];
for ($i=0 ; !feof($fp) ; $i++) { //텍스트 문서에서 한줄한줄 읽어와 배열에 저장
  $data[$i] = fgetcsv($fp, 100, ' ');
  if($i === 0){
    $name = $data[0];
  }

  else if($i === 1){
    $items = $data[1];
  }

  else if($i === 2){
    $itemsAmount = $data[2];
  }


}


fclose($fp);
?>

<script>


</script>