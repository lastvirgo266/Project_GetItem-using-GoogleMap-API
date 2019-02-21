<?php
include_once "itemDB";
$number = $_POST['number'];

//Delete Query
mq("DELETE FROM mapItem WHERE number=$number");


?>