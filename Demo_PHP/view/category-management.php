<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default">
  		<div class="panel-body">
            
            <form action="controller/index_category.php" method="post" align="right">
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
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Tác vụ</th>
                </tr>
                </thead>
                <?php foreach ($categories as $category) { ?>   
                    <form action="controller/index_category.php" method="post">
                    <input type="hidden" name="action" value="update">                         
                        <tr>                
                            <td>
                                <div class="form-group">
                                    <input type="text" name="id" id="id" class="form-control" 
                                        value="<?php echo $category['Id']; ?>" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control" 
                                        value="<?php echo $category['Name']; ?>" required>
                                </div>
                                
                            </td>
                            <td>
                                <select class="form-control" name="stauts">
                                    <option value="1" 
                                      <?php 
                                        if($category['Status'] == 1) echo 'selected="selected"'; 
                                      ?>>Hiện</option>
                                    <option value="0" <?php 
                                      if($category['Status'] == 0) echo 'selected="selected"'; ?>>
                                      Ẩn</option>
                                </select>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="Cập nhật"/>                       
                            </td>
                        </tr>
                    </form>
                <?php } ?>
            </table>
  			

  		</div>
	</div>
</div>

<?php 
include 'footer.php'; 
?>