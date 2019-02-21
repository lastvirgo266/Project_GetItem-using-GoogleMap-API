<?php
	include "../db.php";
	include "../password.php";

	$userid = $_POST['userid'];
	$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
	$username = $_POST['name'];
	$adress = $_POST['adress'];
	$sex = $_POST['sex'];
	$email = $_POST['email'].'@'.$_POST['emadress'];

$sql = "INSERT INTO member (id,pw,name,adress,sex,email) VALUES('$userid','$userpw','$username','$adress','$sex','$email')";

if (mq($sql)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($db);
}

//make user file
$fp = fopen("member_info/$userid.txt",'w');
fwrite($fp,"$userid");
fclose($fp);

?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">