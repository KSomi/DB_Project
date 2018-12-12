<?php
include "dbConnect.php";

$req_num = $_POST['req_num'];


$sql = "UPDATE request SET Complete = 1 WHERE '{$req_num}' = NUM";
$dbConnect->query($sql);

  echo "<script>alert(\"의뢰 완료\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");

?>
