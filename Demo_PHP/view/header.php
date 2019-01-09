<!DOCTYPE html>
<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
      header("location: login.php");
      header("location:" ."../controller/index_user.php?action=check_login");
  }
?>
<html>
    <head>
      <meta charset="UTF-8">
      <title>Trang chủ</title>
	    <link rel="stylesheet" href=" ../view/static/css/bootstrap.min.css">
      <link rel="stylesheet" href=" ../view/static/css/myStyle.css">
      <script type="text/javascript" src=" ../view/static/js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src=" ../view/static/js/bootstrap.js"></script>
      <script>
      function callback(){
          history.back();
        }
      </script>
      <base href="/Demo_PHP/" />  <!-- ROOT_PATH -->
    </head>
    <body>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Trang quản lý</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span>
                <?php
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email']; 
                    }
                ?>
              </a></li>
              <li><a href="controller/index_user.php?action=logout"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
            </ul>
          </div>
        </nav>           
    </body>
</html>
