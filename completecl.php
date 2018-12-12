<?php
include "dbConnect.php";

$req_num = $_POST['req_num'];
$star = $_POST['star'];

$sql = "UPDATE request SET Complete = 2 WHERE '{$req_num}' = NUM";
$dbConnect->query($sql);

$sql = "SELECT * FROM request WHERE '{$req_num}' = NUM";
$res = $dbConnect->query($sql);

$row = mysqli_fetch_array($res);

$id = $row['Accepted'];

$sql = "INSERT INTO portfolio(P_fid, num) VALUES('{$id}','{$req_num}')";
$row = $dbConnect->query($sql);

$sql = "SELECT * FROM freelancer WHERE '{$id}' = ID";
$res = $dbConnect->query($sql);
$row = mysqli_fetch_array($res);

$exp = $row['exp'];
$exp1 = $exp + 1;
$rat = $row['Rating'];
$rating = (($rat * $exp)+$star)/($exp1);


$sql = "UPDATE freelancer SET Rating = '{$rating}' WHERE ID = '{$id}'";
$dbConnect->query($sql);

$sql = "UPDATE freelancer SET exp = '{$exp1}' WHERE ID = '{$id}'";
$dbConnect->query($sql);


  echo "<script>alert(\"승인 완료\");</script>";
  echo("<script>location.href='ReQuestINGCL.html';</script>");

?>
