<?php
      include "dbConnect.php";
      include "session.php";

      $sqlFL = "SELECT id FROM freelancer";
      $resFL = mysqli_query($dbConnect, $sqlFL);
	  $countF = 0;
	  while($row = mysqli_fetch_array($resFL))
	  {
		  $rowFL[$countF++] = $row[0];
	  }
      
		$lenFL = count($rowFL);
	  
	  $sqlCL = "SELECT id FROM client";
      $resCL = mysqli_query($dbConnect, $sqlCL);
      $countC = 0;
      while($row = mysqli_fetch_array($resCL))
	  {
		  $rowCL[$countC++] = $row[0];
	  }
	  
	  $sqlT = "SELECT name FROM team";
      $resT = mysqli_query($dbConnect, $sqlT);
      $countT = 0;
      while($row = mysqli_fetch_array($resT))
	  {
		  $rowT[$countT++] = $row[0];
	  }

	  $sqlRC = "SELECT NUM FROM request WHERE Complete = 1";
	  $resRC = mysqli_query($dbConnect, $sqlRC);
	  $countRC = 0;
	  while($row = mysqli_fetch_array($resRC))
	  {
		  $rowRC[$countRC++] = $row[0];
	  }

	  $sqlRT = "SELECT NUM FROM request WHERE Complete = 2";
	  $resRT = mysqli_query($dbConnect, $sqlRT);
	  $countRT = 0;
	  while($row = mysqli_fetch_array($resRT))
	  {
		  $rowRT[$countRT++] = $row[0];
	  }
         
?>