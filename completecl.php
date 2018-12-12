<?php
include "dbConnect.php";

$req_num = $_POST['req_num'];
$star = $_POST['star'];

$sql = "UPDATE request SET Complete = 2 WHERE '{$req_num}' = NUM";
$dbConnect->query($sql);

$sql = "SELECT * FROM request WHERE '{$req_num}' = NUM";
$res = $dbConnect->query($sql);

$row = mysqli_fetch_array($res);

$id = $row['Accepted'];

$sql = "UPDATE freelancer SET Rating = '{$star}' WHERE ID = '{$id}'";
$dbConnect->query($sql);

  echo "<script>alert(\"승인 완료\");</script>";
  echo("<script>location.href='ReQuestINGCL.html';</script>");

?>
