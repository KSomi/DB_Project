<?php
include "dbConnect.php";
include "session.php";

$member_id = $_SESSION['user_id'];
$member_name = $_POST['member_name'];
$member_hp = $_POST['member_hp'];


$sql = "UPDATE freelancer
SET Name = '$member_name', Phone = '$member_hp'
WHERE ID = '$member_id'";
$info = mysqli_query($dbConnect, $sql);

if(mysqli_query($dbConnect, $sql)){
  echo "<script>alert(\"edit finished\");</script>";
} else {
  echo "<script>alert(\"edit fail\");</script>";
}
echo("<script>location.href='MyPage_CL.html';</script>");
?>
