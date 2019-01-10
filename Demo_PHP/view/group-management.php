<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<?php if( $_SESSION['role'] == 'admin'){ ?>
<div class="col-md-10">
	<div class="panel panel-default">
  		<div class="panel-body">
            
            <form action="controller/index_group.php" method="post" align="right">
                <div class="form-inline " >
                    <input type="hidden" name="action" value="add" >
                    <input type="text" name="name" class="form-control" required>
                    <input type="submit" class="btn btn-primary" value="Thêm mới"/>
                </div>
            </form>
            
            <table  class="table table-hover" >
                <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên nhóm</th>
                    <th>Trạng thái</th>
                    <th>Tác vụ</th>
                </tr>
                </thead>
                <?php foreach ($groups as $group) { ?>   
                    <form action="controller/index_group.php" method="post">
                    <input type="hidden" name="action" value="update">                         
                        <tr>                
                            <td>
                                <div class="form-group">
                                    <input type="text" name="id" id="id" class="form-control" 
                                        value="<?php echo $group['Id']; ?>" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" 
                                        value="<?php echo $group['Name']; ?>" required>
                                </div>
                                
                            </td>
                            <td>
                                <select class="form-control" name="stauts">
                                    <option value="1" 
                                      <?php 
                                        if($group['Status'] == 1) echo 'selected="selected"'; 
                                      ?>>Hiện</option>
                                    <option value="0" <?php 
                                      if($group['Status'] == 0) echo 'selected="selected"'; ?>>
                                      Ẩn</option>
                                </select>
                            </td>
                            
                            <td>
                                <input type="submit" class="btn btn-primary" value="Cập nhật"/>  
                                <a class="btn btn-success" 
                                    href="controller/index_group.php?action=group_info&id=<?php echo $group['Id']; ?>">
                                Chi tiết
                                </a>                      
                            </td>
                        </tr>
                    </form>
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