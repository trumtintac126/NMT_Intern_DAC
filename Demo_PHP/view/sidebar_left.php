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
              <a href="controller/index_user.php?action=user_list" >Người dùng</a>
              <a href="controller/index_category.php?action=category_list">Danh mục</a>
              <a href="controller/index_product.php?action=product_list" class="active">Sản phẩm</a>
              <a href="controller/index_purchase_order.php?action=purchase_order_list">Nhóm</a>
            </div>                  
        </div>
        
                 
