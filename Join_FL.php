<?php
include "dbConnect.php";

$member_id = $_POST['member_id'];
$member_pw = $_POST['member_pw'];
$member_name = $_POST['member_name'];
$member_hp = $_POST['member_hp'];
$member_age = $_POST['member_age'];
$member_career = $_POST['member_career'];
$member_major = $_POST['member_major'];
$member_pl = $_POST['member_pl'];

$c = $_POST['c'];
$j = $_POST['j'];
$js = $_POST['js'];
$p = $_POST['p'];
$e = $_POST['e'];

$member_pw = md5($member_pw); // 암호화

$sql = "SELECT * FROM freelancer WHERE ID = '{$member_id}'";
$res = $dbConnect->query($sql);
if($res->num_rows >= 1)
{
  echo "<script>alert(\"아이디가 이미 존재합니다\");</script>";
  echo("<script>location.href='Join_FL.html';</script>");
}//아이디 중복체크

$sql = "INSERT INTO freelancer(ID, Password, Name, Phone, Age, Major, Career)
VALUES('{$member_id}','{$member_pw}','{$member_name}','{$member_hp}','{$member_age}','{$member_major}','{$member_career}')";

if($dbConnect->query($sql)){
  $sql = "INSERT INTO proficiency(ID, Pro_c, Pro_j, Pro_js, Pro_p, Pro_e)
  VALUES('{$member_id}','{$c}','{$j}','{$js}','{$p}','{$e}')";
  if($dbConnect->query($sql))
  {
    echo "<script>alert(\"회원가입 완료\");</script>";
  }
  else {
    echo "<script>alert(\"회원가입 실패\");</script>";
  }
}
else {
  echo "<script>alert(\"회원가입 실패\");</script>";
}
echo("<script>location.href='Home.html';</script>");

?>
