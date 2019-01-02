<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default">
  		<div class="panel-body">
  			<table  class="table table-hover" >
  				<thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên truy cập</th>
                    <th>Họ Tên</th>                   
                    <th>Ngày tham gia</th>
                    <th>Avatar</th>
                    <th>Xóa</th>
                </tr>
            	</thead>
                <?php foreach ($users as $user) { ?>    
                    <tr>
                        <td class="c1"><?php echo $user['Id']; ?></td>
                        <td class="nameP"><?php echo $user['Email']; ?></td>
                        <td class="c1"><?php echo $user['FullName']; ?></td>
                        <td class="c1"><?php echo $user['Created']; ?></td>
                        <td class="c1"><?php echo $user['Avatar']; ?></td>
                        <td class="edit">
                            Tác vụ
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