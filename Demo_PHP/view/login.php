<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập</title>
        <base href="/Demo_PHP/" />  <!-- ROOT_PATH -->
		<link rel="stylesheet" href="view/static/css/bootstrap.min.css">
		<link rel="stylesheet" href="view/static/css/myStyle.css">
		<script type="text/javascript" src="view/static/js/jquery.js"></script>
		<script type="text/javascript" src="view/static/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container  col-md-4 col-md-offset-4" style="margin-top:100px;">
        	<div class="panel panel-success">
	  			<div class="panel-heading">
	  				<h3 style="text-align: center"><b>Đăng nhập</b></h3>
	  			</div>
	  			<div class="panel-body">
	  				<i><?php 
	  					// session_start();
	  					// if (isset($_SESSION['message'])) {
	  					// 	echo $_SESSION['message'];
	  					// 	$_SESSION['message'] = '';
						  // }
						  	session_start();

							if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
								header("location: index.php");
								exit;
							}
	  				?></i>
	  				<form action="controller/index_user.php" method="post">
						<input type="hidden" name="action" value="check_login">
						<div class="form-group">
							<label>Tên truy cập</label>
							<input type="text" name="email" id="email" class="form-control" 
								required placeholder="Nhập tên truy cập">
						</div>
						<div class="form-group">
							<label>Mật khẩu</label>
							<input type="password" name="password" id="password" class="form-control" 
								required placeholder="Nhập mật khẩu">
						</div>
						<input type="submit" class="btn btn-primary" value="Đăng nhập" />
					</form>  
	  			</div>
  			</div>
		</div>
    </body>
</html>
