<?php
include "dbConnect.php";

$prof = $_POST['prof'];
$leaderid = $_POST['leaderid'];
$teammateid1 = $_POST['teammateid1'];
$teammateid2 = $_POST['teammateid2'];
$teammateid3 = $_POST['teammateid3'];
$teammateid4 = $_POST['teammateid4'];
$teammateid5 = $_POST['teammateid5'];

$a2 = 0;
$a3 = 0;
$a4 = 0;
$a5 = 0;

$sql = "SELECT * FROM team WHERE Name = '{$prof}'";
$res = $dbConnect->query($sql);
if($res->num_rows >= 1)
{
  echo "<script>alert(\"중복된 팀명입니다\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");
}

$sql = "SELECT * FROM freelancer WHERE ID = '{$leaderid}'";
$res = $dbConnect->query($sql);
if($res->num_rows == 0)
{
  echo "<script>alert(\"유효한 아이디를 입력하세요\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");
}
$sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid1}'";
$res = $dbConnect->query($sql);
if($res->num_rows == 0)
{
  echo "<script>alert(\"유효한 아이디를 입력하세요\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");
}
if($teammateid2 != "")
{
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid2}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    echo "<script>alert(\"유효한 아이디를 입력하세요\");</script>";
    echo("<script>location.href='MyPage_FL.html';</script>");
  }
  $a2 = 1;
}
if($teammateid3 != "")
{
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid3}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    echo "<script>alert(\"유효한 아이디를 입력하세요\");</script>";
    echo("<script>location.href='MyPage_FL.html';</script>");
  }
  $a3 = 1;
}
if($teammateid4 != "")
{
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid4}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    echo "<script>alert(\"유효한 아이디를 입력하세요\");</script>";
    echo("<script>location.href='MyPage_FL.html';</script>");
  }
  $a4 = 1;
}
if($teammateid5 != "")
{
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid5}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    echo "<script>alert(\"유효한 아이디를 입력하세요\");</script>";
    echo("<script>location.href='MyPage_FL.html';</script>");
  }
  $a5 = 1;
}


$sql = "INSERT INTO team(Name,Leader) VALUES('{$prof}','{$leaderid}')";
$dbConnect->query($sql);
$sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$leaderid}')";
$dbConnect->query($sql);
$sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid1}')";
$dbConnect->query($sql);
if($a2 == 1) { $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid2}')"; $dbConnect->query($sql);}
if($a3 == 1) { $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid3}')"; $dbConnect->query($sql);}
if($a4 == 1) { $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid4}')"; $dbConnect->query($sql);}
if($a5 == 1) { $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid5}')"; $dbConnect->query($sql);}

echo "<script>alert(\"팀 생성 완료\");</script>";
echo("<script>location.href='MyPage_FL.html';</script>");

?>
