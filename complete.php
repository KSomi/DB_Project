<?php
include "dbConnect.php";

$req_num = $_POST['req_num'];
$star = $_POST['star'];


$sql = "UPDATE request SET Complete = 1 WHERE '{$req_num}' = NUM";
$dbConnect->query($sql);

$sql = "SELECT * FROM request WHERE NUM = '{$req_num}'";
$res = $dbConnect->query($sql);
$row = mysqli_fetch_array($res);

$cid = $row['C_id'];

$sql = "UPDATE client SET Rating = '{$star}' WHERE '{$cid}' = ID";
$dbConnect->query($sql);

  echo "<script>alert(\"의뢰 완료\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");

?>
