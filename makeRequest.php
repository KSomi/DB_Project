<?php
include "dbConnect.php";

$c_id = $_POST['c_id'];
$budget = $_POST['budget'];
$datestart = $_POST['datestart'];
$dateend = $_POST['dateend'];
$career = $_POST['career'];
$PL = $_POST['PL'];
$PL_Prof = $_POST['PL_Prof'];
$minP = $_POST['minP'];
$maxP = $_POST['maxP'];

$c = $_POST['c'];
$j = $_POST['j'];
$js = $_POST['js'];
$p = $_POST['p'];
$e = $_POST['e'];

$target_dir = "requestfiles/";
$target_file = $target_dir . basename($_FILES["RQfile"]["name"]);

chmod("requestfiles", 0777);

move_uploaded_file($_FILES["RQfile"]["tmp_name"], $target_file);

$sql = "INSERT INTO request(C_id, Budget, Start_date, End_date, Pro_c, Pro_j, Pro_js, Pro_p, Pro_e, Minimum_career, Min_num_person, Max_num_person)
VALUES('{$c_id}','{$budget}','{$datestart}','{$dateend}','{$c}','{$j}','{$js}','{$p}','{$e}','{$career}','{$minP}','{$maxP}')";

if($dbConnect->query($sql))
{
  echo "<script>alert(\"등록 완료\");</script>";
  echo("<script>location.href='MyPage_CL.html';</script>");
}
else {
  echo "<script>alert(\"등록 실패\");</script>";
  echo("<script>location.href='makeRequest.html';</script>");
}

?>
