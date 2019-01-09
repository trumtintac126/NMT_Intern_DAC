<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default col-md-6 col-md-offset-3">
  		<div class="panel-body">
        <h3 class="text-center"><b>Thông tin nhóm</b></h3>
  			<form action="controller/index_group.php" method="post" >
                    <input type="hidden" name="action" value="update_info">
                    <div class="form-group">
                        <label>Tên nhóm</label>
                        <input type="text" name="name" id="name" class="form-control" 
                          value="<?php echo $group['Name'] ?>" readonly>
                    </div>
                    <div class ="form-row">
                        <div class="form-group col-md-6">
                        <label>Thành viên nhóm</>
                            <?php 
                                foreach ($userInfoByGroup as $userinfo) {                      
                            ?>
                                <input type="text" class="form-control" 
                                value="<?php echo $userinfo['Email'] ; ?>" readonly> <br>                                       
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Quyền hạn</>
                            <?php 
                                foreach ($userInfoByGroup as $userinfo) {                       
                            ?>
                                <input type="text" class="form-control" 
                                value="<?php echo $userinfo['roleName'] ; ?>" readonly>  <br>                                       
                            <?php } ?>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Cập nhập"/>
                    <button class="btn btn-danger" onclick="callback()">Hủy</button>
                </form>  

  		</div>
	</div>

</div>

<?php 
include 'footer.php'; 
?>