<?php 
include '../view/header.php'; 
include '../view/sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default col-md-6 col-md-offset-3">
  		<div class="panel-body">
        <h3 class="text-center"><b>Thông tin cá nhân</b></h3>
  			<form action="controller/index_user.php?action=update_info" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_info">
                    <div class="form-group">
                        <label>Mã</label>
                        <input type="text" name="id" id="id" class="form-control" 
                          value ="<?php echo $user['Id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tên truy cập</label>
                        <input type="text" name="email" id="email" class="form-control" 
                          value="<?php echo $user['Email'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tình trạng</label>
                      <select class="form-control" name="status">
                        <option value="1" 
                          <?php 
                            if($user['Status'] == 1) echo 'selected="selected"'; 
                          ?>>Hoạt động</option>
                        <option value="0" <?php 
                          if($user['Status'] == 0) echo 'selected="selected"'; ?>>
                          Khóa</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" 
                          value="<?php echo $user['FullName'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày tham gia</label>
                        <input readonly type="date" name="created" id="created" class="form-control" 
                          value="<?php echo $user['Created'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Hình ảnh</label>
                      <input type="file" name="file1" id="anh" min="0" class="form-control" >
                      <img src="view/images/<?php echo $user['Avatar'];?>" height="100px"/>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Cập nhật"/>
                </form>  

  		</div>
	</div>

</div>

<?php 
include '../view/footer.php'; 
?>