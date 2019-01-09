<style>
  .vertical-menu {
      width: 200px;
  }

  .vertical-menu a {
      background-color: #eee;
      color: black;
      display: block;
      padding: 12px;
      text-decoration: none;
  }

  .vertical-menu a:hover {
      background-color: #ccc;
  }

  .vertical-menu a.active {
      background-color: black;
      color: white;
  }
</style>

        <div class="container-fluid">
        <div class="col-md-2">
            <div class="vertical-menu">
            <?php
                if ($_SESSION['role'] == 'admin') {            
            ?>
              <a href="controller/index_user.php?action=user_list" >Người dùng</a>
              <a href="controller/index_category.php?action=category_list">Danh mục</a>
              <a href="controller/index_product.php?action=product_list">Sản phẩm</a>
              <a href="controller/index_group.php?action=group_list">Nhóm</a>
            <?php  }?>
             
            <?php
                 if ($_SESSION['role'] == 'leader' OR $_SESSION['role'] == 'employee') {        
            ?>
             <a href="controller/index_user.php?action=user_list" >Người dùng</a>
              <a href="controller/index_product.php?action=product_list">Sản phẩm</a>
            <?php  }?>

            </div>                  
        </div>
        
                 
