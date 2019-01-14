<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<?php if( $_SESSION['role'] == 'admin'){ ?>
<div class="col-md-10">
	<div class="panel panel-default col-md-6 col-md-offset-3">
  		<div class="panel-body">
        <h3 class="text-center"><b>Thông tin nhóm</b></h3>
  			<form action="controller/index_group.php" method="post" >
                    <input type="hidden" name="action" value="update_group_info">
                    <div class="form-group">
                        <input type="text" name="id" id="id" class="form-control" 
                          value="<?php echo $group['Id'] ?>" readonly>
                    </div>
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
                        
                    <div class="form-group">
                        <label for="members" >Thêm thành viên vào nhóm</label>
                        <div class="col-sm-10">
                            <?php foreach ($usernogroup as $user) { ?>
                            <div class="checkbox">
                                <label><input type="checkbox" name="useringroup[]" value='<?php echo $user['Id'] ?>'>
                                    <?php echo ($user['Email']) ?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div> 
                        <input type="submit" class="btn btn-primary" value="Cập nhập"/>
                        <button class="btn btn-danger" onclick="callback()">Quay về</button>
                    </div>
                </form>  

  		</div>
	</div>

</div>
<?php }else{ echo "ban khong co quyen truy cap" ?>
<?php }?>
<?php 
include 'footer.php'; 
?>