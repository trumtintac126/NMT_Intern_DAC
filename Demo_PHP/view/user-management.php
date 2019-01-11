<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<?php if($_SESSION['role'] == 'admin' OR $_SESSION['role'] == 'leader'){ ?>
<div class="col-md-10">
	<div class="panel panel-default">
  		<div class="panel-body">
            <?php  if($_SESSION['role'] == 'admin' ) {?>
                <a class="btn btn-success btn-sm" href="controller/index_user.php?action=creationForm">Thêm mới <span class="glyphicon glyphicon-plus"></span></a><br><hr>
            <?php }?>          
  			<table  class="table table-hover" >
  				<thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên truy cập</th>
                    <th>Họ Tên</th>                   
                    <th>Ngày tham gia</th>
                    <th>Avatar</th>
                    <th>Tác vụ</th>
                </tr>
            	</thead>
                <?php foreach ($users as $user) { ?>    
                    <tr>
                        <td class="c1"><?php echo $user['userId']; ?></td>
                        <td class="nameP"><?php echo $user['Email']; ?></td>
                        <td class="c1"><?php echo $user['FullName']; ?></td>
                        <td class="c1"><?php echo $user['Created']; ?></td>
                        <td><img src="view/images/<?php echo $user['Avatar'];?>" width ="50px" height="50px"/></td>
                        <td>

                        <?php
                            if($_SESSION['role'] == 'admin' OR ($_SESSION['role'] == 'leader' AND $_SESSION['group_Id'] == $user['Group_Id'])){ ?>                              
                            <a class="btn btn-primary btn-sm" 
                                href="controller/index_user.php?action=user_info&id=<?php echo $user['userId']; ?>">
                                Chi tiết
                            </a>
                            <?php 
                                 if($user['Status'] == 1){                                   
                            ?>
                                <a class="btn btn-danger btn-sm" 
                                href="controller/index_user.php?action=active&id=<?php echo $user['userId']; ?>">
                                <?php echo 'Active';?>
                            <?php }else{?>
                                <a class="btn btn-danger btn-sm" 
                                href="controller/index_user.php?action=nonActive&id=<?php echo $user['userId']; ?>">
                                <?php echo 'NonActive';?>
                            <?php }?>
                            </a>
                            <?php }else { ?>
                                <span class="label label-warning">Không quyền</span>
                        <?php }?>
                        </td>
                    </tr>
                <?php } ?>
            </table>

  		</div>
	</div>
</div>
<?php }else{ echo "ban khong co quyen truy cap" ?>
<?php }?>
<?php 
include 'footer.php'; 
?>