<?php
include "dbConnect.php";

$req_num = $_POST['req_num'];

$sql = "UPDATE request SET Complete = 2 WHERE '{$req_num}' = NUM";
$dbConnect->query($sql);

  echo "<script>alert(\"승인 완료\");</script>";
  echo("<script>location.href='ReQuestINGCL.html';</script>");

?>
