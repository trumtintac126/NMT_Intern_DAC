<?php 
include '../view/header.php'; 
include '../view/sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default col-md-6 col-md-offset-3">
  		<div class="panel-body">
        <h3 class="text-center"><b>Thông tin sản phẩm</b></h3>
  			<form action="controller/index_product.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="update_info">
                    <div class="form-group">
                        <label>Mã sản phẩm</label>
                        <input type="text" name="id" id="id" class="form-control" 
                          value ="<?php echo $product['Id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label>Tình trạng</label>
                      <select class="form-control" name="status">
                        <option value="1" 
                          <?php 
                            if($product['Status'] == 1) echo 'selected="selected"'; 
                          ?>>Hiện</option>
                        <option value="0" <?php 
                          if($product['Status'] == 0) echo 'selected="selected"'; ?>>
                          Ẩn</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="category_id" class="form-control">
                            <?php foreach ($categories as $category) {?>
                            <option value="<?php echo $category['Id']; ?>"><?php echo $category['Name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" name="name" id="name" class="form-control" 
                          value="<?php echo $product['Name'] ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Hình ảnh</label>
                      <input type="file" name="file1" id="anh" min="0" class="form-control" >
                      <img src="view/images/<?php echo $product['Image'];?>" height="100px"/>
                    </div>
                    <div class="form-group">
                        <label>Chi tiết</label>
                        <input type="text" name="description" id="description" class="form-control" 
                          value="<?php echo $product['Description'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="text" name="price" id="price" class="form-control" 
                          value="<?php echo $product['Price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input type="text" name="quantity" id="quantity" class="form-control" 
                          value="<?php echo $product['Quantity'] ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Cập nhập"/>
                </form>  

  		</div>
	</div>

</div>

<?php 
include '../view/footer.php'; 
?>