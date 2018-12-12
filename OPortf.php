<?php
include "dbConnect.php";


$target_dir = "oportfiles/";
$target_file = $target_dir . basename($_FILES["Oportf"]["name"]);


move_uploaded_file($_FILES["Oportf"]["tmp_name"], $target_file);


  echo "<script>alert(\"등록 완료\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");

?>
