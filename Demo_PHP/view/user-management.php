<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default">
  		<div class="panel-body">
            <a class="btn btn-success btn-sm" href="controller/index_user.php?action=creationForm">Thêm mới <span class="glyphicon glyphicon-plus"></span></a><br><hr>
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
                        <td class="c1"><?php echo $user['Id']; ?></td>
                        <td class="nameP"><?php echo $user['Email']; ?></td>
                        <td class="c1"><?php echo $user['FullName']; ?></td>
                        <td class="c1"><?php echo $user['Created']; ?></td>
                        <td><img src="view/images/<?php echo $user['Avatar'];?>" width ="50px" height="50px"/></td>
                        <td>
                            <a class="btn btn-primary btn-sm" 
                                href="controller/index_user.php?action=user_info&id=<?php echo $user['Id']; ?>">
                                Chi tiết
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>

  		</div>
	</div>
</div>

<?php 
include 'footer.php'; 
?>