<?php
include "dbConnect.php";

$prof = $_POST['prof'];
$leaderid = $_POST['leaderid'];
$teammateid1 = $_POST['teammateid1'];
$teammateid2 = $_POST['teammateid2'];
$teammateid3 = $_POST['teammateid3'];
$teammateid4 = $_POST['teammateid4'];
$teammateid5 = $_POST['teammateid5'];

$team = 0; // state: 0: is null, 1: is alright, 2: repeated
$leader = 0;
$a1 = 0;
$a2 = 0;
$a3 = 0;
$a4 = 0;
$a5 = 0; // state: 0: is null, 1: is alright. 2: insert wrong ID.
$pass = 1;

if($leaderid != "")
{
  $leader = 1;
  $sql = "SELECT * FROM freelancer WHERE ID = '{$leaderid}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    $leader = 2;
  }
}

if($teammateid1 != "")
{
  $a1 = 1;
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid1}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    $a1 = 2;
  }
}

if($teammateid2 != "")
{
  $a2 = 1;
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid2}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    $a2 = 2;
  }
}

if($teammateid3 != "")
{
  $a3 = 1;
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid3}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    $a3 = 2;
  }
}

if($teammateid4 != "")
{
  $a4 = 1;
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid4}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    $a4 = 2;
  }
}

if($teammateid5 != "")
{
  $a5 = 1;
  $sql = "SELECT * FROM freelancer WHERE ID = '{$teammateid5}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows == 0)
  {
    $a5 = 2;
  }
}

////////////////////

if($prof != "")
{
  $team = 1;
  $sql = "SELECT * FROM team WHERE Name = '{$prof}'";
  $res = $dbConnect->query($sql);
  if($res->num_rows >= 1)
  {
    $team = 2;
  }
}



//////////////////////

if($team == 0)
{
  $pass = 0;
  echo "<script>alert(\"팀명이 입력되지 않았습니다.\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");
}

if($team == 2)
{
  $pass = 0;
  echo "<script>alert(\"팀명이 이미 존재합니다.\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");
}

if($leader == 0)
{
  $pass = 0;
  echo "<script>alert(\"팀 리더 ID를 입력하세요.\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");
}

if(($leader == 0) && ($a1 == 0) && ($a2 == 0) && ($a3 == 0) && ($a4 == 0) && ($a5 == 0))
{
  $pass = 0;
  echo "<script>alert(\"최소 1명 이상의 팀원이 필요합니다.\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");
}


if(($leader == 2) || ($a1 == 2) || ($a2 == 2) || ($a3 == 2) || ($a4 == 2) || ($a5 == 2))
{
  $pass = 0;
  echo "<script>alert(\"존재하지 않는 아이디입니다.\");</script>";
  echo("<script>location.href='MyPage_FL.html';</script>");
}


///////////////////////////////////////////////////////////////////////////////////


if($pass == 1)
{
  $sql = "INSERT INTO team(Name,Leader) VALUES('{$prof}','{$leaderid}')";
  $dbConnect->query($sql);
}
if($a1 == 1 && $pass == 1)
{
  $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid1}')";
  $dbConnect->query($sql);
}
if($a2 == 1 && $pass == 1)
{
  $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid2}')";
  $dbConnect->query($sql);
}
if($a3 == 1 && $pass == 1)
{
  $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid3}')";
  $dbConnect->query($sql);
}
if($a4 == 1 && $pass == 1)
{
  $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid4}')";
  $dbConnect->query($sql);
}
if($a5 == 1 && $pass == 1)
{
  $sql = "INSERT INTO teammate(Teamname,Teammate) VALUES('{$prof}','{$teammateid5}')";
  $dbConnect->query($sql);
}

/////////////////////////////////////////////////////////////////////////////////////////

echo "<script>alert(\"팀 생성 완료\");</script>";
echo("<script>location.href='MyPage_FL.html';</script>");

?>
