<?php
include "dbConnect.php";

$user_id = $_POST['user_id'];
$num = $_POST['numb'];

$sql = "UPDATE request SET Accepted='{$user_id}', Complete='1' WHERE '{$num}' = NUM";
$res = $dbConnect->query($sql);


  echo "<script>alert(\"신청 완료\");</script>";
  echo("<script>location.href='HOME-LI.html';</script>");

?>
