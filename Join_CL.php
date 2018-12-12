<?php
include "dbConnect.php";

$member_id = $_POST['member_id'];
$member_pw = $_POST['member_pw'];
$member_name = $_POST['member_name'];
$member_hp = $_POST['member_hp'];

$member_pw = md5($member_pw); // 암호화

$sql = "SELECT * FROM client WHERE ID = '{$member_id}'";
$res = $dbConnect->query($sql);
if($res->num_rows >= 1)
{
  echo "<script>alert(\"아이디가 이미 존재합니다\");</script>";
  echo("<script>location.href='Join_CL.html';</script>");
}//아이디 중복체크

$sql = "INSERT INTO client(ID, Password, Name, Phone) VALUES('{$member_id}','{$member_pw}','{$member_name}','{$member_hp}')";

if($dbConnect->query($sql)){
  echo "<script>alert(\"회원가입 완료\");</script>";
}
else {
  echo "<script>alert(\"회원가입 실패\");</script>";
}
echo("<script>location.href='Home.html';</script>");

?>
