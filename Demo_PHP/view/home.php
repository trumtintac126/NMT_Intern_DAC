<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>

<div class="col-md-10">
	<div class="panel panel-default">
  		<div class="panel-body text-center" style="padding-top : 90px; padding-bottom: 90px;">
  			<h1>WELCOME 
			  <?php
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email']; 
                    }
                ?>
			</h1>
  		</div>
  	</div>
</div>