<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default col-md-6 col-md-offset-3">
  		<div class="panel-body">
        <h3 class="text-center"><b>Thêm mới người dùng</b></h3>
  			<form action="controller/index_user.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_new_user">
                    <div class="form-group">
                        <label>Tên truy cập</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" id="password" class="form-control" required>      
                    </div>
                    <div class="form-group">
                      <label>Quyền truy cập</label>
                      <select name="role_id" class="form-control">
                            <?php foreach ($roles as $role) {?>
                            <option value="<?php echo $role['Id']; ?>">
                              <?php echo $role['Name']; ?>    
                            </option>
                            <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nhóm</label>
                      <select name="group_id" class="form-control">
                            <?php foreach ($groups as $group) {?>
                            <option value="<?php echo $group['Id']; ?>">
                              <?php echo $group['Name']; ?>    
                            </option>
                            <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" 
                          required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file" name="file1" id="anh" min="0" class="form-control" >
                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="Thêm mới"/>
                        <button class="btn btn-danger" onclick="callback()">Hủy</button>
                    </div>
                </form>  

  		</div>
	</div>

</div>

<?php 
include 'footer.php'; 
?>