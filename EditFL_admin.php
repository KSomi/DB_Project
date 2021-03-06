<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta charset="utf-8" http-equiv="encoding">

        <!--<script src="node.js"></script>-->
        <script src="../dist/moment.min.js"></script>
        <script src="../dist/jquery.min.js"></script>
        <script src="../dist/jquery.daterangepicker.min.js"></script>
        <script src="../dist/jquery.csv.js"></script>
        <title>Basic Info.</title>

        <link href="MyPage.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript">
           
        </script>
        <script>
        $(function(){
            $("#includedContent").load("menubar_MP.html");
        });
        </script>
        <?
          include "dbConnect.php";
          include "session.php";
		  $_SESSION['id'] = $_GET['id'];
          $user_id = $_GET['id'];

          $sql = "SELECT * FROM freelancer WHERE ID='{$user_id}'";
          $res = $dbConnect->query($sql);
          $row = mysqli_fetch_array($res);

          $user_name = $row['Name'];
          $user_ph = $row['Phone'];
          $user_age = $row['Age'];
          $user_career = $row['Career'];
          $user_major = $row['Major'];
        ?>
    </head>

    <body>
        <div class ="page-holder">
            <div id="includedContent"></div>

            <div class= "head">- My Page</div>

            <form method='post' action = 'EditFL_ad.php' id="frm">
            <div class ="info-holder">

                <div class ="menu">기본 정보</div>
                <div class ="row">
                    
                    <div class ="label">ID: </div>
                    <input class="fit" id="id" name="id" value='<?echo "$user_id"?>' disabled>
                    
                </div>

                <div class ="row">
                    <div class ="label">이름: </div>
                    <input class="fit" id="name" name="member_name" value='<?echo "$user_name"?>' required>
                </div>

                <div class ="row">
                    <div class ="label">P.H: </div>
                    <input class="fit" id="HP" name="member_hp" value='0<?echo "$user_ph"?>' required>
                </div>

                <div class ="row">
                    <div class ="label">나이: </div>
                    <input class="fit" id="age" name="member_age" value='<?echo "$user_age"?>' required>
                </div>

                <div class ="row">
                    <div class ="label">경력: </div>
                    <input class="fit" id="career" name="member_career" value='<?echo "$user_career"?>' required>
                </div>

                <div class ="row">
                    <div class ="label">학과: </div>
                    <input class="fit" id="major" name="member_major" value='<?echo "$user_major"?>' required>
                </div>

                <br>
                <div class="row">
                    <input type='submit' class="savebtn" id="store" value='등록'>
                </div>
            </div>
            </form>
		

        </div>
	
    </body>
</html>