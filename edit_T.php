<?php
include "dbConnect.php";
include "session.php";

$Tname = $_SESSION['Tname'];
$T_leader = $_POST['T_leader'];

$sql =  "SELECT * FROM teammate WHERE Teamname = '{$Tname}' AND Teammate = '{$T_leader}'";
$res = $dbConnect->query($sql);
if($res->num_rows == 0)
{
	echo "<script>alert(\"팀 내에 해당 아이디가 존재하지 않습니다.\");</script>";
	echo("<script>location.href='MyPage_admin.html';</script>");
}

if('T_leader')
$sql = "UPDATE team
SET Leader = '$T_leader'
WHERE Name = '$Tname'";
$info = mysqli_query($dbConnect, $sql);

if(mysqli_query($dbConnect, $sql)){
  echo "<script>alert(\"edit finished\");</script>";
} else {
  echo "<script>alert(\"edit fail\");</script>";
}
echo("<script>location.href='MyPage_admin.html';</script>");
?>