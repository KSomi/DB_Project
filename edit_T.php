<?php
include "dbConnect.php";
include "session.php";

$Tname = $_SESSION['Tname'];
$T_leader = $_POST['T_leader'];


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