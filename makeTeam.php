<?php
include "dbConnect.php";

$prof = $_POST['prof'];
$leaderid = $_POST['leaderid'];
$teammateid = $_POST['teammateid'];

$sql = "INSERT INTO team(Name,Leader,Mem_list) VALUES('{$prof}','{$leaderid}','{$teammateid}')";

$dbConnect->query($sql);

echo("<script>location.href='MyPage_FL.html';</script>");

?>
