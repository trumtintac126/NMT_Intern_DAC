<?php 
include '../view/header.php'; 
include '../view/sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default col-md-6 col-md-offset-3">
  		<div class="panel-body">
        <h3 class="text-center"><b>Thêm mới sản phẩm</b></h3>
  			<form action="controller/index_product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add_new_product">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Danh mục</label>
                      <select name="category_id" class="form-control">
                            <?php foreach ($categories as $category) {?>
                            <option value="<?php echo $category['Id']; ?>">
                              <?php echo $category['Name']; ?>    
                            </option>
                            <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Chi tiết</label>
                        <textarea type="text" name="description" id="description" class="form-control"></textarea> 
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <input type="number" name="price" id="price" class="form-control" min="0" required> 
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="number" name="quantity" id="quantity" min="0" class="form-control" required>
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
include '../view/footer.php'; 
?>