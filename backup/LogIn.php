<?php
include "dbConnect.php";
include "session.php";

$user_id = $_POST['user_id'];
$user_pw = md5($user_pw=$_POST['user_pw']);

$sql = "SELECT * FROM client WHERE ID = '{$user_id}' AND Password = '{$user_pw}'";
$res = $dbConnect->query($sql);

$row = $res->fetch_array(MYSQLI_ASSOC);

if($row != null)
{
  $_SESSION['user_id'] = $user_id;
  echo "<script>alert(\"로그인 완료\");</script>";
  echo("<script>location.href='Home-LI.html';</script>");
}
else
{
  $sql = "SELECT * FROM freelancer WHERE ID = '{$user_id}' AND Password = '{$user_pw}'";
  $res = $dbConnect->query($sql);

  $row = $res->fetch_array(MYSQLI_ASSOC);

  if($row != null)
  {
    $_SESSION['user_id'] = $user_id;
    echo "<script>alert(\"로그인 완료\");</script>";
    echo("<script>location.href='Home-LI.html';</script>");
  }
  if($row == null)
  {
    echo "<script>alert(\"아이디와 비밀번호를 다시 확인하세요\");</script>";
    echo("<script>location.href='Login.html';</script>");
  }
}

?>
