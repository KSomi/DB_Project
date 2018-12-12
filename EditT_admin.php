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

          $_SESSION['Tname'] = $_GET['id'];
          $Tname = $_GET['id'];

          $sql = "SELECT * FROM team WHERE name='{$Tname}'";
          $res = $dbConnect->query($sql);
          $row = mysqli_fetch_array($res);

          $T_leader = $row['Leader'];
        ?>

    </head>

    <body>
        <div class ="page-holder">
            <div id="includedContent"></div>
            <div class= "head">- My Page</div>

            <form method='post' action = 'edit_T.php' id="frm">
            <div class ="info-holder">
                <div class ="menu">기본 정보</div>
                <div class ="row">
                    <div class ="label">Name: </div>
                    <input class="fit" id="name" name="name" value='<?echo "$Tname"?>' disabled>
                </div>

                <div class ="row">
                    <div class ="label">팀 리더: </div>
                    <input class="fit" id="leader" name="T_leader" value='<?echo "$T_leader"?>' required>
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