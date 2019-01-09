<?php 
include 'header.php'; 
include 'sidebar_left.php'; 
?>
<div class="col-md-10">
	<div class="panel panel-default">
  		<div class="panel-body">

            <div class="row">
                <div class="col-md-2">
                    <p>Category</p>
                    <select name="category_id" class="form-control">
                            <option value="-1">
                                All
                            </option>
                            <?php foreach ($categories as $category) {?>
                            <option value="<?php echo $category['Id']; ?>">                            
                              <?php  
                                    echo $category['Name']; ?>    
                            </option>
                            <?php } ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <p>Group</p>
                    <select name="category_id" class="form-control">
                            <option value="-1">
                                All
                            </option>
                            <?php foreach ($categories as $category) {?>
                            <option value="<?php echo $category['Id']; ?>">                            
                              <?php  
                                    echo $category['Name']; ?>    
                            </option>
                            <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <p>Search</p>
                    <input type="text" name="searchAjax" id="searchAjax" class="form-control"  placeholder="Nhập tên người dùng cần tìm"> 
                </div>
                <div class="col-md-4"><p>Tác vụ</p> <a class="btn btn-success btn-sm" href="controller/index_product.php?action=creationForm">Thêm mới <span class="glyphicon glyphicon-plus"></span></a></div>
            </div>                        
  			<table  class="table table-hover" id="tableList">
  				<thead>
                <tr>
                    <th>Mã</th>
                    <th>Nhóm sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Chi tiết</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Nhân viên phụ trách</th>
                    <th>Nhóm nhân viên</th>
                    <th>Tình trạng</th>
                    <th>Tác vụ</th>                    
                </tr>
            	</thead>
                <?php foreach ($products as $product) { ?>    
                    <tr>
                        <td><?php echo $product['Id']; ?></td>
                        <td><?php echo $product['CategoryName']; ?></td>
                        <td><?php echo $product['Name']; ?></td>
                        <td><img src="view/images/<?php echo $product['Image'];?>" width = "50px" height="50px"/></td>
                        <td><?php echo $product['Description']; ?></td>
                        <td><?php echo $product['Price']; ?></td>
                        <td><?php echo $product['Quantity']; ?></td>
                        <td><?php echo $product['FullName']; ?></td>
                        <td><?php echo $product['GroupName']; ?></td>
                        <td>
                            <?php 
                                if($product['Status'] == 1){
                                    echo '<span class="label label-info" >Hiện</span>';
                                }else{
                                    echo '<span class="label label-danger">Ẩn</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" 
                                href="controller/index_product.php?action=product_info&id=<?php echo $product['Id']; ?>">
                                Chi tiết
                            </a>
                            <?php 
                                 if($product['Status'] == 1){                                   
                            ?>
                                <a class="btn btn-danger btn-sm" 
                                href="controller/index_product.php?action=active&id=<?php echo $product['Id']; ?>">
                                <?php echo 'Active';?>
                            <?php }else{?>
                                <a class="btn btn-danger btn-sm" 
                                href="controller/index_product.php?action=nonActive&id=<?php echo $product['Id']; ?>">
                                <?php echo 'NonActive';?>
                            <?php }?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>                         
  		</div>
	</div>
</div>

<?php 
include '../view/footer.php'; 
?>