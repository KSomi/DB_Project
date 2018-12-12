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

$target_dir = "requestfiles/";
$target_file = $target_dir . basename($_FILES["RQfile"]["name"]);

chmod("requestfiles", 0777); 

if(move_uploaded_file($_FILES["RQfile"]["tmp_name"], $target_file))
{
  echo "<script>alert(\"파일완료\");</script>";
}
else {
  echo "<script>alert(\"파일에러\");</script>";
}

$sql = "INSERT INTO request(C_id, Budget, Start_date, End_date, PL, Proficiency, Minimum_career, Min_num_person, Max_num_person)
VALUES('{$c_id}','{$budget}','{$datestart}','{$dateend}','{$PL}','{$PL_Prof}','{$career}','{$minP}','{$maxP}')";

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
