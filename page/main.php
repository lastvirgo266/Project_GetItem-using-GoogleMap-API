<?php include "itemDB.php"; ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
</head>


<body>
<!-- Load Google Map -->
<div id="googleMap" style="width:700px;height:700px;"></div>
<br>



<!-- Load Inventory -->
<div>
<?php
	if(isset($_SESSION['userid'])){
		echo "<h2>{$_SESSION['userid']} 님 환영합니다.</h2>";
	?>

	<a href="/member/logout.php"><input type="button" value="로그아웃" /></a>

	<?php 
		}else{
		echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
	} 
	?>
</div>


<button id="GetItemBtn">Try it</button>



<div>
    <table style="width:50px">
    <caption>아이템 아이템</caption>
    <tr>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <td class = "item"></td>
      <td class = "item"></td>
      <td class = "item"></td>
    </tr>
    <tr>
      <td class = "item"></td>
      <td class = "item"></td>
      <td class = "item"></td>
    </tr>
    <tr>
      <td class = "item"></td>
      <td class = "item"></td>
      <td class = "item"></td>
    </tr>
    </table>
</div>
<?php include "loadInventory.php"; include "loadMapinfo.php";?>

<script type="text/javascript" src="interConnect.js"></script>
</body>
</html>


